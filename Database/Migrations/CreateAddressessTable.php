<?php

namespace Database\Migrations;

class CreateAddressessTable

{
    public static function addresses()
    {
        try {
            $query = "CREATE TABLE IF NOT EXISTS addresses (

                id INT AUTO_INCREMENT PRIMARY KEY,
                session_id INT NOT NULL,
                username VARCHAR(100),
                email VARCHAR(255) NOT NULL UNIQUE,
                phone VARCHAR(100) NOT NULL UNIQUE,
                city VARCHAR(100) NOT NULL,
                address TEXT NOT NULL,
                UNIQUE(email, phone),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";

            $stm = DBConnect()->prepare($query);
            return $stm->execute();
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
}
