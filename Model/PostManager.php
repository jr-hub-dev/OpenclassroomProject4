<?php

namespace App\Model;

use App\Model\Database;
use DateTime;

class PostManager extends Database
{ 

    public function getPost($postId) 
    {   
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, title, content, creationDate, updateDate FROM post WHERE id = ?'); // formater la date dans la vue + table avec 5 champs
        $req->execute(array($postId));

        return $this->hydrate($req->fetch());
    }

    public function getPosts() 
    {   
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, title, content, creationDate, updateDate FROM post'); // formater la date dans la vue + table avec 5 champs
        $req->execute();
        $result = $req->fetchAll();
        //var_dump($result);

        $posts = [];
        foreach ($result as $post) {
            //var_dump($post);
            $posts[] = $this->hydrate($post);
        }
        
        return $posts;
    }

    public function create($title, $content)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO post(title, content, creationDate, updateDate) VALUES (?, ?, NOW(), NOW())');
        $req->execute(array($title, $content));

        return $bdd->lastInsertId();
    }

    public function modify($postId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE post SET title = ?, content = ?, updateDate = NOW() WHERE id = ?');//a voir
        
        return $req->execute(array(
            $_POST['title'], 
            $_POST['content'], 
            $postId
        ));

    }

    public function delete($postId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM post WHERE id = ?');
        
        return $req->execute(array($postId));
    }

    public function hydrate($data)
    {
        /*var_dump($data);
        var_dump(new DateTime());
        var_dump(new DateTime($data['creationDate']));*/
        $post = new Post();
        $post
            ->setId($data['id'])
            ->setTitle($data['title']) 
            ->setContent($data['content'])
            ->setCreationDate(new DateTime($data['creationDate']))
            ->setUpdateDate(new DateTime($data['updateDate']))
        ;
        //var_dump($post);
        return $post;
    }
}