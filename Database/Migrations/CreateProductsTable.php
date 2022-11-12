<?php

namespace Database\Migrations;

class CreateProductsTable
{
    public static function products()
    {
        try {
            $query = "CREATE TABLE IF NOT EXISTS products (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL UNIQUE,
                price BIGINT NOT NULL,
                body TEXT,
                thumbnail VARCHAR(255),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
            )";

            $stm = DBConnect()->prepare($query);
            return $stm->execute();
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
}
