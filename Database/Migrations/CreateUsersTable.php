<?php

namespace Database\Migrations;

class CreateUsersTable

{
    public static function users()
    {
        try {
            $query = "CREATE TABLE IF NOT EXISTS users (

                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(150) NOT NULL
            )";

            $stm = DBConnect()->prepare($query);
            return $stm->execute();
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
}
