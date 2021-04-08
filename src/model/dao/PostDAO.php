<?php

namespace blog\model\dao;

use blog\model\Post;
use blog\database\DatabasePDO;
use PDO;
use PDOException;

class PostDAO
{

    public function findPostByTitle($title) :?array
    {
        try{
            $query = 'SELECT p.id, p.title, p.content, p.creationDate, u.nickname as user '.
                    'FROM Posts as p JOIN User as u '.
                    'ON p.userId = u.id '.
                    'WHERE title LIKE :title '.
                    'ORDER BY p.creationDate DESC';
            $stmt = DatabasePDO::getInstance()->prepare($query);
            
            if ($stmt->execute([':title' => '%'.$title.'%']) && $stmt->rowCount() > 0) {
                return $stmt->fetchAll(PDO::FETCH_CLASS, Post::class);
            }  
            return ["erro"];
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
            $stmt = DatabasePDO::getInstance()->prepare($query);
            if ($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_CLASS, Post::class);
            }
            return null;
        }
        catch (PDOException $e){
            throw new PDOException("Erro na busca de todos os posts! " . $e->getMessage());
        }
    }

    public function findPostById($id) :?Post{
        try {
            $query = 'SELECT p.id, p.title, p.content, p.creationDate, p.updateDate, u.nickname as user '.
                'FROM Posts as p JOIN User as u '.
                'ON p.userId = u.id '.
                'WHERE p.id = :id ';

            $stmt = DatabasePDO::getInstance()->prepare($query);

            if ($stmt->execute([":id" => $id])){
                $stmt->setFetchMode(PDO::FETCH_CLASS, Post::class);
                return $stmt->fetch();
            }
            return null;

        }catch (PDOException $e){
            throw new PDOException("Erro na busca do Post por Id " . $e->getMessage());
        }
    }


}