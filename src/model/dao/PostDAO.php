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

    public function findPostByTitle($title) : ?Post
    {
        try{
            $query = 'SELECT * FROM Posts WHERE title = :title';
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(':title', $title, PDO::PARAM_INT);
            if ($stmt->execute()){
                return $stmt->fetch(PDO::FETCH_CLASS, '\blog\model\Post');
            }
            return null;
        }catch (PDOException $e){
            throw new PDOException("Erro Na Busca Do post por id!" . $e->getMessage());
        }
    }

    public function findAllPosts() : ?array{
        try {
            $query = 'SELECT * FROM Posts';
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