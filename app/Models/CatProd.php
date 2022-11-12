<?php

namespace App\Models;

use PDO;

class CatProd
{
    // Store category and product ID in the pivot table 
    public function storeCatProd($lastProd_id, $category_id)
    {
        foreach ($category_id as $id) {
            $data = [
                'product_id' => $lastProd_id,
                'category_id' => $id
            ];

            $insert = sprintf(
                "INSERT INTO %s (%s) VALUES(%s)",
                "category_product",
                implode(', ', array_keys($data)),
                ":" . implode(', :', array_keys($data))
            );

            $stm = DBConnect()->prepare($insert);
            $stm->execute($data);
        }
    }

    // Update category, product ID in the pivot table 
    public function updateCatProd($productId, $category_id)
    {
        try {

            $this->deleteCatProd($productId);

            $this->storeCatProd($productId, $category_id);
            
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

    // Delete row 
    private function deleteCatProd($productId)
    {
        $delete = "DELETE FROM category_product WHERE product_id=?";

        $stm = DBConnect()->prepare($delete);
        $stm->execute([$productId]);

    }

    // Get categories by product id 
    public function getCategories($id)
    {
        $select = "SELECT category_id FROM category_product WHERE product_id=?";

        $stm = DBConnect()->prepare($select);
        $stm->execute([$id]);
        return $stm->fetchAll(PDO::FETCH_COLUMN);
    }

    // Get categories on the condition product ID 
    public function cats($product_id)
    {
       $select = "SELECT c.name FROM categories c
            join category_product cp
            on cp.category_id = c.id
            where product_id =?";

        $stm = DBConnect()->prepare($select);
        $stm->execute([$product_id]);
        return $stm->fetchAll(PDO::FETCH_COLUMN);
    }

}
