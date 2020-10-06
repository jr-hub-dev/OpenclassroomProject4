<?php

namespace App\Model;

use App\Model\Database;
use DateTime;

class PostManager extends Database
{
    //Récupère le post par id
    public function getPost($postId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT post_id, title, content, creation, modification FROM post WHERE post_id = ?'); // formater la date dans la vue + table avec 5 champs
        $req->execute(array($postId));

        return $this->hydrate($req->fetch());
    }

    //Récupère les posts par id
    public function getPosts()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT post_id, title, content, creation, modification FROM post');
        $req->execute();
        $result = $req->fetchAll();

        $posts = [];
        foreach ($result as $post) {
            $posts[] = $this->hydrate($post);
        }

        return $posts;
    }

    //Retourne le dernier post
    public function returnLast()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT post_id, title, content, creation, modification FROM post WHERE post_id = ( SELECT MAX(post_id) FROM post );');
        $req->execute(array());

        return $this->hydrate($req->fetch());
    }

    //Création nouveau post
    public function create($postClean)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO post(title, content, creation, modification) VALUES (?, ?, NOW(), NOW())');
        $req->execute(array($postClean['title'], $postClean['content']));

        return $bdd->lastInsertId();
    }

    //Modification post
    public function modify($postId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE post SET title = ?, content = ?, modification = NOW() WHERE post_id = ?');

        return $req->execute(array(
            $postClean['title'] = $_POST['title'],
            $postClean['content'] = $_POST['content'],
            $postId
        ));
    }

    //Suppression post
    public function delete($postId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM post WHERE post_id = ?');

        return $req->execute(array($postId));
    }

    //Hydratation de l'objet
    public function hydrate($data)
    {
        $post = new Post();
        $post
            ->setId($data['post_id'])
            ->setTitle($data['title'])
            ->setContent($data['content'])
            ->setCreationDate(new DateTime($data['creation']))
            ->setUpdateDate(new DateTime($data['modification']));

        return $post;
    }
}
