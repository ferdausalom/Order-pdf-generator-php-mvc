<?php

namespace Database\Migrations;

class CreateCategoriesTable
{
    public static function categoriesTable()
    {
        try {
            $query = "CREATE TABLE IF NOT EXISTS categories(
                id INT AUTO_INCREMENT PRIMARY KEY,
                -- parent_id INT NOT NULL DEFAULT 0,
                name VARCHAR(100) NOT NULL UNIQUE,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";

            $stm = DBConnect()->prepare($query);
            $stm->execute();
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
}
