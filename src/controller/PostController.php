<?php

namespace blog\controller;

use blog\model\Post;

class PostController
{
    private Post $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function listaPosts()
    {
        $posts = $this->post->findAllPosts();
        return array_reverse($this->setObjectToPost($posts));
    }

    private function setObjectToPost($posts) : array
    {
        $arr = [];
        foreach ($posts as $post){
            $p = new Post();
            $p->setId($post->id);
            $p->setTitle($post->title);
            $p->setContent($post->content);
            $p->setCreationDate($post->creationDate);
            $p->setUpdateDate($post->updateDate);
            $p->setSlug($post->slug);
            $p->setUser($post->userId);
            array_push($arr, $p);
        }
        return $arr;
    }
}