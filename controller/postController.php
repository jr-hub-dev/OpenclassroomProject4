<?php

namespace App\Controller;

use App\Model\PostManager;
use App\Model\CommentManager;
use App\Model\UserManager;

class PostController
{
    private $postClean = array();
    private $commentClean = array();

    public function cleanData()
    {   
        $errors = [];
        if (!empty($_POST)) {  
            $this->postClean = filter_var_array($_POST, FILTER_SANITIZE_STRING);

            if (!empty($this->postClean)) {
                if (array_key_exists('title', $this->postClean)) {
                    if ('' === $this->postClean['title']) {       
                        $errors[] = 'Veuillez entrer le titre du post';
                    } elseif (strlen($this->postClean['title']) < 5) {
                        $errors[] = 'Votre titre doit faire plus de 5 lettres';
                    }
                }
                //Verification de content
                if (array_key_exists('content', $this->postClean) && '' === $this->postClean['content']) {
                    $errors[] = 'Veuillez entrer un contenu';
                }
                //Verification du commentaire
                $this->commentClean = filter_var_array($_POST, FILTER_SANITIZE_STRING);
                if (array_key_exists('comment', $this->commentClean) && '' === $this->commentClean['comment']) {
                    $errors[] = 'Veuillez entrer un commentaire';
                }
            }
        }

        return $errors;
    }


    //Afficher vue
    public function view($postId)
    {
        $postManager = new PostManager();
        $post = $postManager->getPost($postId);

            
        //Traitement du formulaire
        $errors = $this->cleanData();
        $commentManager = new CommentManager();
        if (!empty($this->commentClean) && empty($errors)) {
            
            $commentManager->create($postId, $this->postClean);   
            
            header('Location: index.php?objet=post&action=view&id=' . $postId);           
        } 
        
        $comments = $commentManager->getAllByPostId($postId);
        
        $template = 'postView';
        include '../view/layout.php';
    }

     //Creation nouveau chapitre
    public function create()
    {
        $errors = $this->cleanData(); 

        //Vérifie que le post n'est pas vide et ne contient pas d'erreurs
        if (!empty($this->postClean) && empty($errors)) {
            $postManager = new PostManager();
            $postId = $postManager->create($this->postClean);
    
            header('Location: index.php?objet=post&action=view&id=' . $postId);
        } 

        //Affichage du formulaire // appelle new userManager
        //if
        /*$admin = userManager
        ->isAdmin();*/
        $userManager = new UserManager();
        $admin = $userManager->isAdmin();
    var_dump($admin);        
        if($admin === "admin"){
            $template = 'postCreate';
            include '../view/layout.php';
        }elseif($admin === "user") { 
            echo 'Vous devez être administrateur pour accéder à cette page';
            }
    }

    //Modifier un post
    public function modify($postId) //idem que create
    { 
        $postManager = new PostManager();
        $post = $postManager->getPost($postId);

        $errors = $this->cleanData();
 
        if (!empty($this->postClean) && empty($errors)) {
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
