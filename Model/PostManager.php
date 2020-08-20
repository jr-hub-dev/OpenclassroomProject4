<?php

namespace App\Model;

use App\Model\Database;
use DateTime;

class PostManager extends Database
{ 

    public function getPost($postId) 
    {   
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT post_id, title, content, creation, modification FROM post WHERE post_id = ?'); // formater la date dans la vue + table avec 5 champs
        $req->execute(array($postId));

        return $this->hydrate($req->fetch());
    }

    public function getPosts() 
    {   
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT post_id, title, content, creation, modification FROM post');
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

    public function returnLast()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT post_id, title, content, creation, modification FROM post WHERE post_id=2;'); //rechercher avec MAX(id)
        $req->execute(array());

        return $this->hydrate($req->fetch());
    }

    public function create($postClean)
    {var_dump($postClean);
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO post(title, content, creation, modification) VALUES (?, ?, NOW(), NOW())');
        $req->execute(array($postClean['title'], $postClean['content']));

        return $bdd->lastInsertId();
    }

    public function modify($postId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE post SET title = ?, content = ?, modification = NOW() WHERE post_id = ?');
        
        return $req->execute(array(
            $postClean['title'] = $_POST['title'],
            $postClean['content']= $_POST['content'], 
            $postId
        ));

    }

    public function delete($postId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM post WHERE post_id = ?');
        
        return $req->execute(array($postId));
    }

    public function hydrate($data)
    {
        /*var_dump($data);
        var_dump(new DateTime());
        var_dump(new DateTime($data['creation']));*/
        $post = new Post();
        $post
            ->setId($data['post_id'])
            ->setTitle($data['title']) 
            ->setContent($data['content'])
            ->setCreationDate(new DateTime($data['creation']))
            ->setUpdateDate(new DateTime($data['modification']))
        ;
        //var_dump($post);
        return $post;
    }
}