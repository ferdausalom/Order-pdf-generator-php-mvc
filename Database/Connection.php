<?php

namespace Database;

use PDO;

class Connection
{
    public static function connect($config)
    {
        try {
            return new PDO(
                "mysql:host=" . $config['host'] . ";dbname=" . $config['dbname'],
                $config['username'],
                $config['password']
            );
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
}
