<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Cart;

class CartController
{
    // Get the cart items and show it in the front 
    public function index()
    {
        $cartItems = (new Cart)->cartItems();

        return view("front/cartIndex", [
            'cartItems' => $cartItems
        ]);
    }

    // Store cart item 
    public function store()
    {
        $values = $this->requestValues(Request::values());
        
        // Validate if it's blank or not 
        if ($values['productId'] === '' || $values['clientIp'] === '') {
            return redirect("/");
        }

        // Check if product already in the cart?
        $exists = (new Cart)->existingCheck($values['productId']);

        // Check if requested item already in the cart and has same quantity or not  
        if ($exists->product_id && $exists->quantity == '1' && $values['quantity'] == '1') {

            $this->sessionCreate('error', 'message', 'Product already in the cart.');
            if (isset($values['back'])) {

                return back($values['back']);

            }
        } else {

            // Update the cart if has different quantity but same product ID 
            if ($exists->product_id) {

                (new Cart)->updateCart($values['productId'], $values['quantity']);

                $this->sessionCreate('error', 'message', 'Cart updated!');
                if (isset($values['back'])) {

                    return back($values['back']);

                }
            }
        }

        // Sent to store item 
        (new Cart)->storeCart($values['productId'], $values['clientIp'], $values['quantity']);

        // Redirect and show message 
        $this->sessionCreate('error', 'message', 'Product added in the cart.');
        return redirect("/");

    }

    // Update cart item 
    public function update()
    {
        $values = $this->requestValues(Request::values());

        // Validate if it's blank or not 
        if ($values['productId'] === '' || $values['clientIp'] === '') {
            return redirect("/");
        }

        // Check if product already in the cart?
        $exists = (new Cart)->existingCheck($values['productId']);

        // Check if requested item already in the cart and has same quantity or not  
        if ($exists->product_id && $exists->quantity == '1' && $values['quantity'] == '1') {

            $this->sessionCreate('error', 'message', 'Product already in the cart.');
            if (isset($values['back'])) {

                return back($values['back']);

            }
        } else {

            // Update the cart if has different quantity but same product ID 
            if ($exists->product_id) {

                (new Cart)->updateCart($values['productId'], $values['quantity']);

                $this->sessionCreate('error', 'message', 'Cart updated!');
                if (isset($values['back'])) {

                    return back($values['back']);

                }
            }
        }

    }
    
    private function requestValues($values)
    {
        $quantity = $values['quantity'] ?? '1';
        $productId = $values['productId'] ?? '';
        $clientIp = $values['clientIp'] ?? '';
        $back = $values['destination'] ?? '';

        return [
            'quantity' => $quantity,
            'productId' => $productId,
            'clientIp' => $clientIp,
            'back' => $back,
        ];
    }

    // Delete cart item 
    public function destroy()
    {
        $productId = Request::values()['productId'] ?? '';
        $back = Request::values()['destination'] ?? '';

        if ($productId === '') {
            return back($back);
        }

        // Check if product has in the cart 
        $exists = (new Cart)->existingCheck($productId);

        if ($exists->product_id) 
        {

            (new Cart)->destroyCart($productId);

            $this->sessionCreate('error', 'message', 'Cart item deleted!');
            if (isset($back)) {

                return back($back);

            }
        }
    }

    private function sessionCreate($message, $name, $text)
    {
        sessionStart();
        sessionUnset($message);
        sessionSet($name, $text);
    }
}