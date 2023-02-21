<?php

namespace App\Config\Connection;

class Connection
{
    private static $instance;


    public static function getInstance()
    {
        try {
            self::$instance = new \PDO('mysql:host=localhost;dbname=igestao', 'root', '');
            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION, \PDO::FETCH_ASSOC);
            return self::$instance;
        } catch (\PDOException $e) {
            return json_encode(array(
                'code' => $e->getCode(),
                'message' => $e->getMessage()
            ));
        }
    }
}