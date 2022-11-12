<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Cart;
use App\Models\Checkout;
use App\Validations\AddressValidation;

class CheckoutController
{
    // Show checkout page and items in the cart 
    public function index()
    {
        $cartItems = (new Cart)->cartItems();
        
        return view("front/checkoutIndex", [
            'cartItems' => $cartItems
        ]);
    }

    // Place order 
    public function place()
    {
        $clientIp = Request::values()['clientIp'] ?? '';
        $payment = Request::values()['payment'] ?? '';
        $amount = Request::values()['amount'] ?? '';

        // Validate address data 
       $address = (new AddressValidation)->validateAddress(Request::values());

    //    Store address 
       $addressId = (new Checkout)->storeAddress($address);

    //    Get cart items by IP address 
       $cartItemByClientIp = (new Cart)->cartItemByClientIp($clientIp);

    //    Check if the order already in the DB 
       $isOrderExists = (new Checkout)->isOrderExists($cartItemByClientIp);

       if ($isOrderExists) {
            $this->sessionCreate('error', 'message', 'Some items already in your order!');
            return redirect('/carts');
       }

       if ($cartItemByClientIp) {
           $orderId = (new Checkout)->processOrder($addressId, $cartItemByClientIp);
       }

       if ($payment == "onDelivery") {

            (new Checkout)->onDelivery($orderId, $clientIp, $address['email'], $amount, 'USD');

            $this->sessionCreate('orderId', 'orderId', $orderId);
            $this->sessionCreate('clientIp', 'clientIp', $clientIp);

        } 
        else {
            
            (new Checkout)->paypalPay($orderId, $amount);

        }

       return redirect("thankyou");
        
    }
    
    // Create invoice to download 
    public function invoice()
    {
        if (isset($_SESSION["orderId"]) && isset($_SESSION["clientIp"])) {
            
            $invoiceData = (new Checkout)->invoiceData($_SESSION["orderId"]);
            $address = (new Checkout)->getAddress($_SESSION["clientIp"]);
            $date = date("Y/m/d");

            sessionUnset("clientIp");
            sessionUnset("orderId");
            
            return view("front/invoice", [
                'address' => $address,
                'invoiceData' => $invoiceData,
                'date' => $date
            ]);
        }

        return redirect("cancel");

    }

    // Returned data from PAYPAL 
    public function returndata()
    {
        (new Checkout)->finalOrder();

        return redirect("thankyou");

    }

    // If showhow cancel the transaction show cancel page
    public function cancel()
    {
        return view("front/cancel");
    }

    // Thank you page 
    public function thankyou()
    {
        return view("front/thankyou");
    }

    private function sessionCreate($message, $name, $text)
    {
        sessionStart();
        sessionUnset($message);
        sessionSet($name, $text);
    }
}