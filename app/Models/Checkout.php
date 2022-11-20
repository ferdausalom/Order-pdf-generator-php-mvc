<?php

namespace App\Models;

use PDO;

use Omnipay\Omnipay;

// Insert your paypal client ID, Secret key and your website return and cancel URL 
define('CLIENT_ID', "YOUR_PAYPAL_CLIENT_ID");
define('SECRET_KEY', "YOUR_PAYPAL_SECRET_KEY");
define('PAYPAL_RETURN_URL', "http://ecommerce.test/returndata");
define('PAYPAL_CANCEL_URL', "http://ecommerce.test/cancel");


class Checkout
{

    public $orderId = "";

    // Store address and return ID 
    public function storeAddress($address)
    {
        $insert = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            "addresses",
            implode(", ", array_keys($address)),
            ":" . implode(", :", array_keys($address))
        );

        $pdo = DBConnect();

        $stm = $pdo->prepare($insert);
        $stm->execute($address);
        return $pdo->lastInsertId();
    }

    // Check if order already placed or not 
    public function isOrderExists($cartItemByClientIp)
    {
        $select = "SELECT product_id, quantity FROM orders";

        $stm = DBConnect()->prepare($select);
        $stm->execute();
        $items = $stm->fetchAll(PDO::FETCH_OBJ);


        foreach ($items as $item) {
            foreach ($cartItemByClientIp as $cartItem) {

                if ($item->product_id == $cartItem->product_id && $item->quantity == $cartItem->quantity) {

                    return true;
                }
            }
        }
    }

    // Store order and return ID 
    public function processOrder($address_id, $cartItemByClientIp)
    {
        foreach ($cartItemByClientIp as $item) {
            $data = [
                'user_id' => $item->user_id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'address_id' => $address_id
            ];

            $insert = sprintf(
                "INSERT INTO %s (%s) VALUES (%s)",
                "orders",
                implode(", ", array_keys($data)),
                ":" . implode(", :", array_keys($data))

            );

            $pdo = DBConnect();
            $stm =  $pdo->prepare($insert);
            $stm->execute($data);
            return $pdo->lastInsertId();
        }
    }

    // Store cash on delivery order 
    public function onDelivery($orderId, $clientIp, $email, $amount, $currency)
    {
        $data = [
            "order_id" => $orderId,
            "payment_id" => $clientIp . "#" . rand(),
            "payer_id" => $clientIp,
            "payer_email" => $email,
            "amount" => $amount,
            "currency" => $currency,
            "payment_method" => "Cash on delivery"
        ];

        $insert = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            "payments",
            implode(", ", array_keys($data)),
            ":" . implode(", :", array_keys($data))
        );

        try {
            $stm = DBConnect()->prepare($insert);
            $stm->execute($data);
        } catch (\Throwable $th) {

            die($th->getMessage());
        }
    }

    // Process paypal payment 
    public function paypalPay($orderId, $amount)
    {
        $this->orderId = $orderId;
        $gateway = $this->setPaypalIdKey();

        try {
            $response = $gateway->purchase([
                'amount' => $amount,
                'currency' => "USD",
                'returnUrl' => PAYPAL_RETURN_URL,
                'cancelUrl' => PAYPAL_CANCEL_URL
            ])->send();

            if ($response->isRedirect()) {
                $response->redirect();
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    private function setPaypalIdKey()
    {
        $gateway = Omnipay::create('PayPal_Rest');

        $gateway->setClientId(CLIENT_ID);
        $gateway->setSecret(SECRET_KEY);
        $gateway->setTestMode(TRUE);

        return $gateway;
    }

    // Finalize paypal payment 
    public function finalOrder()
    {
        $gateway = $this->setPaypalIdKey();

        if (
            array_key_exists('paymentId', $_GET) &&
            array_key_exists('token', $_GET) &&
            array_key_exists('PayerID', $_GET)
        ) {

            $response = $gateway->completePurchase([
                'payer_id' => $_GET['PayerID'],
                'transactionReference' => $_GET['paymentId']
            ])->send();

            if ($response->isSuccessful()) {
                $data = $response->getData();

                $processData = [
                    'order_id' => $this->orderId,
                    'payment_id' => $data['id'],
                    'payer_id' => $data['payer']['payer_info']['payer_id'],
                    'payer_email' => $data['payer']['payer_info']['email'],
                    'amount' => $data['transactions'][0]['amount']['total'],
                    'currency' => 'USD',
                    'payment_method' => 'paypal',
                    'status' => $data['state']
                ];

                $insert = sprintf(
                    "INSERT INTO %s (%s) VALUES (%s)",
                    "payments",
                    implode(", ", array_keys($processData)),
                    ":" . implode(", :", array_keys($processData))
                );

                $stm = DBConnect()->prepare($insert);
                $stm->execute($processData);
            }
        }
    }

    // Get invoice data 
    public function invoiceData($orderId)
    {
        $select = "SELECT 
            pay.order_id, 
            pay.amount, 
            o.product_id, 
            o.quantity,
            p.name,
            p.price 
            from payments pay
            JOIN orders o 
            on o.id = pay.order_id 
            JOIN products p 
            on p.id = o.product_id
        ";

        $stm = DBConnect()->prepare($select);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    // Get addres for invoice 
    public function getAddress($session_id)
    {
        $select = "SELECT ad.username, ad.phone, ad.city, ad.address
         from addresses ad
         where session_id =? LIMIT 1";

        $stm = DBConnect()->prepare($select);
        $stm->execute([$session_id]);
        return $stm->fetch(PDO::FETCH_OBJ);
    }
}
