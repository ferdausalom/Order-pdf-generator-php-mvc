<?php

namespace App\Models;

use PDO;

class Product
{
    // Load all products 
    public function allProduct()
    {
        $select = "SELECT id, name, price, thumbnail FROM products";

        $stm = DBConnect()->prepare($select);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    // Store product 
    public function storeProduct($data)
    {
        try {
            $insert = sprintf(
                "INSERT INTO %s (%s) VALUES(%s)",
                "products",
                implode(', ', array_keys($data)),
                ":" . implode(', :', array_keys($data))
            );
            $pdo = DBConnect();
            $stm = $pdo->prepare($insert);
            $stm->execute($data);

            return $pdo->lastInsertId();
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

    // Update product 
    public function updateProduct($data)
    {
        $update = "UPDATE products 
                SET name=:name,
                price=:price,
                body=:body,
                thumbnail=ifnull(:thumbnail, thumbnail) 
                WHERE id=:id";

        $stm = DBConnect()->prepare($update);
        $stm->execute($data);
    }

    // Delete product 
    public function destroyProd($id)
    {
        $delete = "DELETE FROM products WHERE id=?";
        $stm = DBConnect()->prepare($delete);
        $stm->execute([$id]);
    }

    // Get product by id 
    public function getProduct($id)
    {
        $select = "SELECT * FROM products WHERE id=?";

        $stm = DBConnect()->prepare($select);
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_OBJ);
    }
}
