<?php

namespace Database\Migrations;

class CreateCategoryProductTable
{
    public static function categoryProdTable()
    {
        try {
            $query = "CREATE TABLE IF NOT EXISTS category_product(
            id INT AUTO_INCREMENT PRIMARY KEY,
            product_id INT NOT NULL,
            category_id INT NOT NULL,
            sub_category_id INT,
            FOREIGN KEY (product_id) REFERENCES products (id)
                ON DELETE CASCADE,
            FOREIGN KEY (category_id) REFERENCES categories (id)
                ON DELETE CASCADE,
            FOREIGN KEY (sub_category_id) REFERENCES sub_categories (id)
                ON DELETE CASCADE,
                
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";

            $stm = DBConnect()->prepare($query);
            $stm->execute();
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
}
