<?php

namespace blog\model\dao;

use blog\model\Post;
use PDO;
use blog\database\DatabasePDO;
use PDOException;

class PostDAO
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = DatabasePDO::getConnection();
    }

    public function findPostByTitle($title) :?array
    {
        try{
            $query = 'SELECT p.id, p.title, p.content, p.creationDate, u.nickname as user '.
                    'FROM Posts as p JOIN User as u '.
                    'ON p.userId = u.id '.
                    'WHERE title LIKE :title '.
                    'ORDER BY p.creationDate DESC';
            $stmt = $this->connection->prepare($query);
            if ($stmt->execute([':title' => '%'.$title.'%'])){
                return $stmt->fetchAll(PDO::FETCH_CLASS);
            }
            return null;
        }catch (PDOException $e){
            throw new PDOException("Erro Na Busca Do post por id!" . $e->getMessage());
        }
    }

    public function findAllPosts() : ?array{
        try {
            $query = 'SELECT p.id, p.title, p.content, p.creationDate, u.nickname as user '.
            'FROM Posts as p JOIN User as u '.
            'ON p.userId = u.id '.
            'ORDER BY p.creationDate DESC';
            $stmt = $this->connection->prepare($query);
            if ($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_CLASS);
            }
            return null;
        }
        catch (PDOException $e){
            throw new PDOException("Erro na busca de todos os posts! " . $e->getMessage());
        }
    }


}