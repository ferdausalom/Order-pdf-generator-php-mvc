<?php

namespace Database\Migrations;

class CreateCartsTable

{
    public static function carts()
    {
        try {
            $query = "CREATE TABLE IF NOT EXISTS carts (

                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT,
                session_id INT,
                product_id INT NOT NULL,
                quantity INT NOT NULL DEFAULT 1,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

                FOREIGN KEY (user_id) REFERENCES users (id),
                FOREIGN KEY (product_id) REFERENCES products (id) ON DELETE CASCADE
            )";

            $stm = DBConnect()->prepare($query);
            return $stm->execute();
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
}
