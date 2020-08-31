<?php

namespace App\Model;

use App\Model\Database;
use DateTime;

class CommentManager extends Database
{ 

    public function getComment($commentId) 
    {   
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, post_id, content, creation, modification FROM comment WHERE id = ?'); // formater la date dans la vue + table avec 5 champs
        $req->execute(array($commentId));

        return $this->hydrate($req->fetch());
    }

    public function getComments() 
    {   
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, post_id, content, creation, modification FROM comment'); // formater la date dans la vue + table avec 5 champs
        $req->execute();
        $result = $req->fetchAll();
        //var_dump($result);

        $comments = [];
        foreach ($result as $comment) {
var_dump($comment);
            $comments[] = $this->hydrate($comment);
        }
        
        return $comments;
    }

    public function getAllByPostId($postId) 
    {   
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, post_id, content, creation, modification FROM comment WHERE post_id = ?'); // formater la date dans la vue + table avec 5 champs
        $req->execute(array($postId));
        $result = $req->fetchAll();

        $comments = [];
        foreach ($result as $comment) {
            $comments[] = $this->hydrate($comment);
        }
        
        return $comments;
    }

    public function alert($commentId)
    {   
        
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE comment SET alert = true WHERE id = ?');
        
        $req->execute(array($commentId));
    }

    public function create($postId, $commentClean)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO comment(post_id, content, creation, modification) VALUES (?, ?, NOW(), NOW())');
        $req->execute(array($postId, $commentClean['comment']));
    }

    public function modify($commentId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE comment SET content = ?, modification = NOW() WHERE id = ?');
        
        return $req->execute(array(
            $commentClean['content']= $_POST['content'], 
            $commentId
        ));

    }

    public function delete($commentId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM comment WHERE id = ?');
        
        return $req->execute(array($commentId));
    }

    public function hydrate($data)
    {
        $comment = new comment();
        $comment
            ->setId($data['id'])
            ->setPostNumber($data['post_id'])
            ->setContent($data['content'])
            ->setCreationDate(new DateTime($data['creation']))
            ->setUpdateDate(new DateTime($data['modification']))
        ;

        return $comment;    
    }
}