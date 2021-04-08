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
    
    public function postView()
    {
        header('location: ../posts/posts.php');
    }

    public function listaPosts() :?array
    {
        return $this->post->findAllPosts();
    }

    public function findPostByTitle(string $title) :?array
    {
        return $this->post->findPostByTitle($title);
    }

    public function findPostById($id) :?Post
    {
        return $this->post->findPostById($id);
    }
}