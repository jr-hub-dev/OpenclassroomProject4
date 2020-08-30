<?php

namespace App\Controller;

use App\Model\PostManager;
use App\Model\CommentManager;
use App\Model\USerManager;

class PostController
{
    private $postClean = array();
    private $commentClean = array();

    public function cleanData()
    {   
        $errors = [];
//var_dump($_POST);
        if (!empty($_POST)) {  
            $this->postClean = filter_var_array($_POST, FILTER_SANITIZE_STRING);
var_dump($this->postClean);
            if (!empty($this->postClean)) {
var_dump('test');
                //Verification de title
                // var_dump(array_key_exists('title', $this->postClean));
                // var_dump($this->postClean['title'], $this->postClean['content']);
                if (array_key_exists('title', $this->postClean)) {
var_dump('1');
                    if ('' === $this->postClean['title']) {       
var_dump('3');
                        $errors[] = 'Veuillez entrer le titre du post';
                    } elseif (strlen($this->postClean['title']) < 5) {
var_dump('2');
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
var_dump($errors);       
//die;
        return $errors;
    }


    //Afficher vue
    public function view($postId)
    {
        $postManager = new PostManager();
        $post = $postManager->getPost($postId);

        $commentManager = new CommentManager;
        if(isset($_POST["Signaler"])){
            var_dump('ok');
            $commentManager = new CommentManager;
            $commentManager->alert($alert);
        }
        
        
        //Traitement du formulaire
        $errors = $this->cleanData();
        if (!empty($this->commentClean) && empty($errors)) {

            $commentManager->create($postId, $this->postClean);   
            
            header('Location: index.php?objet=post&action=view&id=' . $postId);           
        } 

        $comments = $commentManager->getAllByPostId($postId);        
        
        $template = 'postView';
        include '../view/layout.php';
    }

   /* public function view($postId)
    {
        $postManager = new PostManager();
        $post = $postManager->getPost($postId);

        if (isset($_POST["Ajouter"])){   
            $errors = $this->cleanData();
            if (!empty($this->postClean) && empty($errors)) {

                $commentManager->create($postId, $this->postClean);   
                
                header('Location: index.php?objet=post&action=view&id=' . $postId);
            } 
    
            $comments = $commentManager->getAllByPostId($postId);
        }
        if (isset($_POST["Signaler"])){
                $alert = new CommentManager;
                $alert = $commentManager->alert();            
        }
        
    $template = 'postView';
    include '../view/layout.php';
}*/

    /*public function view($postId)
    {
        $postManager = new PostManager();
        $post = $postManager->getPost($postId);

        switch (Submittype)
        {
            case "Ajouter":
                {   
                    $errors = $this->cleanData();
                    if (!empty($this->postClean) && empty($errors)) {

                        $commentManager->create($postId, $this->postClean);   
                        
                        header('Location: index.php?objet=post&action=view&id=' . $postId);
                    } 
            
                    $comments = $commentManager->getAllByPostId($postId);
                    break;
                }
            case "Signaler":
                {
                    $alert = new CommentManager;
                    $alert = $commentManager->alert();
                    
                    break;
                }
        }
        
    $template = 'postView';
    include '../view/layout.php';
}*/

    //Creation nouveau
    public function create()
    {
        //verifier que user a les droits
        //Traitement du formulaire
        $errors = $this->cleanData(); 

        if (!empty($this->postClean) && empty($errors)) {
            /*var_dump($this->postClean);
            die;*/
            $postManager = new PostManager();
            $postId = $postManager->create($this->postClean);
    
            header('Location: index.php?objet=post&action=view&id=' . $postId);
        } 

        //Affichage du formulaire
        $template = 'postCreate';
        include '../view/layout.php';
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
