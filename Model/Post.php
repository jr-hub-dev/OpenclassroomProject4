<?php

namespace App\Model;

use DateTime;

class Post
{
    private $id;
    private $title;
    private $content;
    private $creationDate;
    private $updateDate;


    public function getId() : ?int //a utilisre dans la vue
    {
        return $this->id;
    }

    public function setId(?int $id) : self //int ou nul
    {
        $this->id = $id;

        return $this;
    }
    
    public function getTitle() : ?string //a utilisre dans la vue
    {
        return $this->title;
    }


    public function setTitle(?string $title) : self //string ou nul
    {
        $this->title = $title;

        return $this;
    }

    public function getContent() : ?string //a utilisre dans la vue
    {
        return $this->content;
    }

    public function setContent(?string $content) : self //int ou nul
    {
        $this->content = $content;

        return $this;
    }
    public function getCreationDate() : ?DateTime //a utilisre dans la vue
    {
        return $this->creationDate;
    }

    public function setCreationDate(?DateTime $creationDate)// : self //int ou nul
    {
        $this->creationDate = $creationDate;

        return $this;
    }
    public function getUpdateDate() : ?DateTime //a utilisre dans la vue
    {
        return $this->updateDate;
    }

    public function setupdateDate(?DateTime $updateDate)// : self //int ou nul
    {
        $this->updateDate = $updateDate;

        return $this;
    }
}