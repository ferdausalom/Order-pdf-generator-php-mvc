<?php

namespace Database\Migrations;

class CreatePaymentsTable

{
    public static function payments()
    {
        try {
            $query = "CREATE TABLE IF NOT EXISTS payments (

                id INT AUTO_INCREMENT PRIMARY KEY,
                order_id INT,
                payment_id VARCHAR(255) NOT NULL,
                payer_id VARCHAR(255) NOT NULL,
                payer_email VARCHAR(255) NOT NULL,
                amount BIGINT NOT NULL,
                currency VARCHAR(255) NOT NULL,
                payment_method VARCHAR(150) NOT NULL,
                status VARCHAR(150) NOT NULL DEFAULT 'pending',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

                FOREIGN KEY (order_id) REFERENCES orders (id)
            )";

            $stm = DBConnect()->prepare($query);
            return $stm->execute();
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
}
