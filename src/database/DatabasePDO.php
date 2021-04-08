<?php

namespace blog\database;

use PDO;
use PDOException;

class DatabasePDO
{
    private const HOST = 'localhost';
    private const DATABASE_NAME = 'blog';
    private const DB_USER = 'root';
    private const DB_PASSWORD = '';
    
    private static $instance;
    
    public static function getInstance() : PDO
    {
        if (empty(self::$instance)) {
            try {
                self::$instance = new PDO(
                    'mysql:host='. self::HOST.';dbname='. self::DATABASE_NAME,
                    self::DB_USER, self::DB_PASSWORD
                );
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $pdoException) {
                throw new PDOException('Erro na conexão ao banco' . $pdoException->errorInfo);
            }
        }
        return self::$instance;
    }
    
    private function __construct()
    {
        
    }
}