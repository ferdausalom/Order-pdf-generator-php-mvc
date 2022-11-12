<?php

namespace Database\Migrations;

class CreateOrdersTable

{
    public static function orders()
    {
        try {
            $query = "CREATE TABLE IF NOT EXISTS orders (

                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT,
                product_id INT NOT NULL,
                quantity INT NOT NULL,
                address_id INT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

                FOREIGN KEY (user_id) REFERENCES users (id),
                FOREIGN KEY (product_id) REFERENCES products (id) ON DELETE CASCADE,
                FOREIGN KEY (address_id) REFERENCES addresses (id) ON DELETE CASCADE
            )";

            $stm = DBConnect()->prepare($query);
            return $stm->execute();
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
}
