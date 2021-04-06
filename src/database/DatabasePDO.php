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

    public function __construct()
    {
        $this->setConnection();
    }

    public static function getConnection() : PDO
    {
        return self::setConnection();
    }

    private static function setConnection() : PDO
    {
        try {
            $connection = new PDO(
                'mysql:host=' . self::HOST . ';
                    dbname=' . self::DATABASE_NAME,
                self::DB_USER, self::DB_PASSWORD
            );
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $pdoException) {
            throw new PDOException('Erro na conexão ao banco' . $pdoException->errorInfo);
        }
        return $connection;
    }


    public function closeConnection(&$conn) : void
    {
        $conn = null;
    }
}