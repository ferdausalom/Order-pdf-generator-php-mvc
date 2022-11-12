<?php

namespace App\Models;
use PDO;

class Cart
{
    // Pull cart items 
    public function cartItemByClientIp($session_id)
    {
        $select = "SELECT user_id, product_id, quantity from carts WHERE session_id =?";

        try {

            $stm = DBConnect()->prepare($select);
            $stm->execute([$session_id]);
            return $stm->fetchAll(PDO::FETCH_OBJ);

        } catch (\Throwable $th) {
            return redirect("/404");
        }
    }

    // Select product acording to product id in the carts table 
    public function cartItems()
    {
        $select = "SELECT 
            p.id, 
            p.name, 
            p.price, 
            p.thumbnail, 
            c.quantity 
            FROM products p
            JOIN carts c
            ON c.product_id = p.id"
        ;

        try {

            $stm = DBConnect()->prepare($select);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);

        } catch (\Throwable $th) {
            return redirect("/404");
        }
        
    }

    public function existingCheck($product_id)
    {
        $select = "SELECT product_id, quantity FROM carts 
                    WHERE product_id = :product_id LIMIT 1";

        $stm = DBConnect()->prepare($select);
        $stm->execute(['product_id' => $product_id]);
        return $stm->fetch(PDO::FETCH_OBJ);
        
    }

    // Store cart item 
    public function storeCart($productId, $clientIp, $quantity)
    {
        $data = [
            'quantity' => $quantity,
            'session_id' => $clientIp,
            'product_id' => $productId
        ];

        $insert = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            "carts",
            implode(", ", array_keys($data)),
            ":" . implode(", :", array_keys($data))
        );
        
        try {

            $stm = DBConnect()->prepare($insert);
            $stm->execute($data);

        } catch (\Throwable $th) {
            return redirect("/404");
        }
    }

    // Update cart item 
    public function updateCart($productId, $quantity)
    {
        $data = [
            'quantity' => $quantity,
            'product_id' => $productId
        ];

        $update = "UPDATE carts SET
            quantity=:quantity
            WHERE product_id=:product_id";

        try {

            $stm = DBConnect()->prepare($update);
            $stm->execute($data);

        } catch (\Throwable $th) {
            return redirect("/404");
        }
    }

    // Delete cart item 
    public function destroyCart($product_id)
    {
        $delete = "DELETE FROM carts WHERE product_id=?";

        try {
            $stm = DBConnect()->prepare($delete);
            $stm->execute([$product_id]);
        } catch (\Throwable $th) {
            return redirect("/404");
        }
    }

    // Cart count 
    public function itemCount($clientIp)
    {
        $select = "SELECT sum(quantity) FROM carts WHERE session_id =:session_id";

        $stm = DBConnect()->prepare($select);
        $stm->execute(['session_id' => $clientIp]);
        return $stm->fetch(PDO::FETCH_COLUMN);

    }

}