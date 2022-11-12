<?php

namespace Database\Migrations;

class createSubCategoryTable
{
    public static function createSubCategory()
    {
        $query = "CREATE TABLE IF NOT EXISTS sub_categories (
            id INT AUTO_INCREMENT PRIMARY KEY,
            category_id INT NOT NULL,
            name VARCHAR(100) NOT NULL UNIQUE,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

            FOREIGN KEY (category_id) REFERENCES categories (id) ON DELETE CASCADE
        )";

        $stm = DBConnect()->prepare($query);
        $stm->execute();
    }
}