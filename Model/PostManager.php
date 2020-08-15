<?php

namespace App\Model;

use App\Model\Database;
use DateTime;

class PostManager extends Database
{ 

    public function getPost($postId) 
    {   
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT post_id, post_title, post_content, post_creation, updateDate FROM post WHERE post_id = ?'); // formater la date dans la vue + table avec 5 champs
        $req->execute(array($postId));

        return $this->hydrate($req->fetch());
    }

    public function getPosts() 
    {   
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT post_id, post_title, post_content, post_creation, update_date FROM post'); // formater la date dans la vue + table avec 5 champs
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

    public function create($postClean)
    {var_dump($postClean);
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO post(post_title, post_content, post_creation, update_date) VALUES (?, ?, NOW(), NOW())');
        $req->execute(array($postClean['title'], $postClean['content']));

        return $bdd->lastInsertId();
    }

    public function modify($postId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE post SET post_title = ?, post_content = ?, update_date = NOW() WHERE post_id = ?');
        
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
        var_dump(new DateTime($data['post_creation']));*/
        $post = new Post();
        $post
            ->setId($data['post_id'])
            ->setTitle($data['post_title']) 
            ->setContent($data['post_content'])
            ->setCreationDate(new DateTime($data['post_creation']))
            ->setUpdateDate(new DateTime($data['update_date']))
        ;
        //var_dump($post);
        return $post;
    }
}