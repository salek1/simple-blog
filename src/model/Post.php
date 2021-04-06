<?php

namespace blog\model;


use blog\model\dao\PostDAO;
use Cassandra\Date;

class Post
{
    private int $id;
    private string $title;
    private string $content;
    private string $creationDate;
    private string $updateDate;
    private string $slug;

    private string $user;

    private PostDAO $postDAO;

    public function __construct($title = '', $content = '')
    {
        $this->title = $title;
        $this->content = $content;
        //$this->user = new User();
        $this->postDAO = new PostDAO();
    }

    private function setPost($post) :?Post
    {
        if ($post != null){
            $this->setId($post->id);
            $this->setTitle($post->title);
            $this->setContent($post->content);
            $this->setCreationDate($post->creationDate);
            $this->setUpdateDate($post->updateDate);
            $this->setSlug($post->slug);
            $this->setUser($post->userId);
            return $this;
        }
        return null;
    }

    public function findPostByTitle(string $title) :Post{
        if ($title != null && strlen($this->title) > 0){
            if ($post = $this->postDAO->findPostByTitle($title)){
                return $post;
            }
        }
    }

    public function findAllPosts() :?array{
       return $this->postDAO->findAllPosts();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param mixed $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return mixed
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * @param mixed $updateDate
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    public function __toString(): string
    {
        return $this->title;
    }




}