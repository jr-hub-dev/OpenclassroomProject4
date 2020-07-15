<?php

namespace App\Controller;

use App\Model\PostManager;

class PostController
{
    private $postClean = array();

    public function cleanData()
    {
        if (!empty($_POST)) {  
            $this->postClean = filter_var_array($_POST, FILTER_SANITIZE_STRING);
            if (!empty($this->postClean)) {
                if ($this->postClean['title'] === '') {
                    echo 'Veuillez entrer le titre du post';
                    exit;
                } elseif (strlen($this->postClean['title']) < 5) {
                    echo 'Votre titre doit faire plus de 5 lettres';
                    exit;
                } elseif ($this->postClean['content'] === '') {
                    echo 'Veuillez entrer un contenu';
                    exit;
                }
            }
        }
    var_dump($this->postClean);
    //die();
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
<<<<<<< HEAD
<<<<<<< HEAD
    { 
        if (!empty($_POST)) {
            if(empty($_POST['title'])){
                echo 'Veuillez entrer le titre du post';
            }
            if (empty($_POST['content'])){
                echo 'Veuillez entrer un contenu';
            }else{
                $postManager = new PostManager();
<<<<<<< HEAD
                $postId = $postManager->create(filter_var($_POST['title'], FILTER_SANITIZE_STRING), $_POST['content']);
=======
                $postId = $postManager->create($_POST['title'], $_POST['content']);
>>>>>>> 4748ddbcd4d337c575e42dfe2b2757ba17434e19
=======
    {    $postClean = array(
        'cleanTitle' => $cleanTitle = filter_var($_POST['title'], FILTER_SANITIZE_STRING),
        'cleanContent' => $cleanContent = filter_var($_POST['content'], FILTER_SANITIZE_STRING),
        );
var_dump ($cleanTitle);
        if (!empty($postClean)) {
        if(empty($cleanTitle)){
            echo 'Veuillez entrer le titre du post';
        }elseif (empty($cleanContent)){
            echo 'Veuillez entrer un contenu';
        }else{
            $postManager = new PostManager();
            $postId = $postManager->create($postClean['cleanTitle'], $postClean['cleanContent']);
>>>>>>> dev

=======
    {
        //Traitement du formulaire
        $this->cleanData();
        if (!empty($this->postClean)) {
            $postManager = new PostManager();
            $postId = $postManager->create($this->postClean);
    
>>>>>>> dev
            header('Location: index.php?objet=post&action=view&id=' . $postId);
        } 

        //Affichage du formulaire
        $template = 'postCreate';
        include '../view/layout.php';
    }

    //Modifier un post
    public function modify($postId) //idem que create
    { 

        if (!empty($this->postClean)) {
            if ($this->postClean['title'] === '') {
                echo 'Veuillez entrer le titre du post';
            } elseif (strlen($this->postClean['title']) < 5) {
                echo 'Votre titre doit faire plus de 5 lettres';
            } elseif ($this->postClean['content'] === '') {
                echo 'Veuillez entrer un contenu';
            } else {
                $postManager = new PostManager();
                $post = $postManager->getPost($postId);
        
                if (!empty($_POST)) {
                    if ($postManager->modify($postId)) {
                        header('Location: index.php?objet=post&action=view&id=' . $postId);
                    }            
                }
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
