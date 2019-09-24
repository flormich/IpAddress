<?php

namespace App\Database;

class PDOHandler  
{
    private static $pdo;

    private function __construct()
    {

        $content = file_get_contents(__DIR__ . "/../../config/database.json");
        $database = json_decode($content);
        if(!isset($database->username) 
            || !isset($database->database) 
            || !isset($database->host)
            || !isset($database->password)
            )  {
            throw new \RunTimeException ("Acces faux");
        } 
            
        self::$pdo = new \PDO(
            'mysql:host=' . $database->host . ';dbname=' . $database->database . ';charset=utf8', 
            $database->username, 
            $database->password, [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]);    
}

    /**
    * @return \PDO
    */
    public static function getPDO(): \PDO
    {
        if (!self::$pdo) {
            new self();
        }
        return self::$pdo;
    }
}