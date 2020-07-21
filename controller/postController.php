<?php

namespace App\Controller;

use App\Model\PostManager;

class PostController
{
    private $postClean = array();

    public function cleanData()
    {   
        $errors = [];

        if (!empty($_POST)) {  
            $this->postClean = filter_var_array($_POST, FILTER_SANITIZE_STRING);
            if (!empty($this->postClean)) {
                if ('' === $this->postClean['title']) {       
                    $errors[] = 'Veuillez entrer le titre du post';
                } elseif (strlen($this->postClean['title']) < 5) {
                    $errors[] = 'Votre titre doit faire plus de 5 lettres';
                }
                if ('' === $this->postClean['content']) {
                    $errors[] = 'Veuillez entrer un contenu';
                }
            }
        }  
    //var_dump($this->postClean);
    //die();
        return $errors;
    }


    //Afficher vue
    public function view($postId)
    {
        $postManager = new PostManager();
        $post = $postManager->getPost($postId);

        $template = 'postView';
        include '../view/layout.php';
    }

    //Creation nouveau
    public function create()
    {
        //Traitement du formulaire
        $errors = $this->cleanData();
        var_dump($this->postClean);
        if (!empty($this->postClean) && empty($errors)) {
            var_dump(1);
            die;
            $postManager = new PostManager();
            $postId = $postManager->create($this->postClean);
    
            header('Location: index.php?objet=post&action=view&id=' . $postId);
        } 
        var_dump(2);
        //die;
        //Affichage du formulaire
        $template = 'postCreate';
        include '../view/layout.php';
    }

    //Modifier un post
    public function modify($postId) //idem que create
    { 
        $postManager = new PostManager();
        $post = $postManager->getPost($postId);

        $this->cleanData();
 
        if (!empty($this->postClean)) {
            if ($postManager->modify($postId)) {
                header('Location: index.php?objet=post&action=view&id=' . $postId);                    
            }            
        }

        $template = 'postModify';
        include '../view/layout.php';
    }

    //Supprimer un post
    public function delete($postId) 
    { 
        $postManager = new PostManager();
        $post = $postManager->getPost($postId);

        if (!empty($_POST)) {
            if ($postManager->delete($postId)) {
                header('Location: index.php');
                exit;
            }
            header('Location: index.php?objet=post&action=delete&id=' . $postId);            
        }

        $template = 'postDelete';
        include '../view/layout.php';
    }

    //Affiche la list des posts
    public function displayAll()
    {   
        $postManager = new PostManager();
        $posts = $postManager->getPosts();

        $template = 'postsList';
        include '../view/layout.php';
    }
}
