<?php

namespace blog\controller;

use blog\model\Post;
use DateTime;

class PostController
{
    private Post $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function listaPosts() :?array
    {
        $posts = $this->post->findAllPosts();
        return $this->setObjectToPost($posts);
    }

    public function findPostByTitle(string $title) :?array
    {
        if ($title == null){
            return null;
        }
        $posts = $this->post->findPostByTitle($title);
        return $this->setObjectToPost($posts);
    }

    private function setObjectToPost($posts) : array
    {
        $arr = [];
        foreach ($posts as $post){
            $p = new Post();
            $p->setId($post->id);
            $p->setTitle($post->title);
            $p->setContent($post->content);
            $p->setCreationDate(
                DateTime::createFromFormat(
                    'Y-m-d H:i:s',
                    $post->creationDate)->format('d/m/Y H:i:s')
            );
            $p->setUser($post->user);
            array_push($arr, $p);
        }
        return $arr;
    }
}