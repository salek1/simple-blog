<?php

namespace blog\model;

class User
{
    private int $id;
    private string $nickName;
    private string $email;
    private string $password;

    public function __construct($nickName, $email, $password)
    {
        $this->nickName = $nickName;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return Int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param Int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getNickName(): string
    {
        return $this->nickName;
    }

    /**
     * @param String $nickName
     */
    public function setNickName(string $nickName): void
    {
        $this->nickName = $nickName;
    }

    /**
     * @return String
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param String $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return String
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param String $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }


}