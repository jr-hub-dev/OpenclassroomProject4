<?php

namespace App\Model;


class User
{
    private $id;
    private $login;
    private $password;
    private $email;


    public function getId() : ?int 
    {
        return $this->id;
    }

    public function setId(?int $id) : self 
    {
        $this->id = $id;

        return $this;
    }
    
    public function getLogin() : ?string 
    {
        return $this->login;
    }


<<<<<<< HEAD
    public function setLogin(?string $login) : self 
=======
    public function setLogin(?string $login) : ?string 
>>>>>>> dev
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword() : ?string 
    {
        return $this->password;
    }

    public function setPassword(?string $password) : self 
    {
        $this->password = $password;

        return $this;
    }
    public function getEmail() : ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email)
    {
        $this->email = $email;

        return $this;
    }
}