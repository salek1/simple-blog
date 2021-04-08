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

    public function __construct()
    {
        $this->postDAO = new PostDAO();
    }

    public function findPostByTitle(string $title) :?array{

        if ($title != null && strlen($title) > 0){
            $post = $this->postDAO->findPostByTitle($title);
            if ($post != null){
                return $post;
            }
        }
        return null;
    }

    public function findAllPosts() :?array{
       return $this->postDAO->findAllPosts();
    }

    public function findPostById($id) :?Post{
        $post = $this->postDAO->findPostById($id);
        if ($post){
            return $post;
        }
        return null;
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
        return ucfirst($this->title);
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
        return ucfirst($this->content);
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
        return ucfirst($this->user);
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
        return $this->getTitle();
    }




}