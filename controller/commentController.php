<?php

namespace App\Controller;

use App\Model\CommentManager;

class CommentController
{
    private $commentClean = array();

    public function cleanData()
    {   
        $errors = [];

        if (!empty($_POST)) {  
            $this->commentClean = filter_var_array($_POST, FILTER_SANITIZE_STRING);
            if (!empty($this->commentClean)) {
                if (strlen($this->commentClean['content']) < 5) {
                    $errors[] = 'Votre commentaire doit faire plus de 5 lettres';
                } elseif ('' === $this->commentClean['content']) {
                    $errors[] = 'Veuillez entrer un contenu';
                }
            }
        }  
    //var_dump($this->commentClean);
    //die();
        return $errors;
    }


    //Afficher vue
    public function view($commentId)
    {
        if (!empty($this->commentClean)) {
            $commentManager = new CommentManager();
            $comment = $commentManager->getComment($commentId);
        }
    }

    //Creation nouveau
    public function create()
    {
        //Traitement du formulaire
        $errors = $this->cleanData();
        var_dump($this->commentClean);
        if (!empty($this->commentClean) && empty($errors)) {
            var_dump(1);
            //die;
            $commentManager = new CommentManager();
            $commentId = $commentManager->create($this->commentClean);
    
            header('Location: index.php?objet=post&action=view&id=' . $postId);
        } 
        var_dump(2);
        //die;
        //Affichage du formulaire
        $template = 'postCreate';
        include '../view/layout.php';
    }

    //Modifier un comment
    public function modify($commentId) //idem que create
    { 
        $commentManager = new CommentManager();
        $comment = $commentManager->getcomment($commentId);

        $this->cleanData();
 
        if (!empty($this->commentClean)) {
            if ($commentManager->modify($commentId)) {
                header('Location: index.php?objet=post&action=view&id=' . $postId);                    
            }            
        }

        $template = 'postModify';
        include '../view/layout.php';
    }

    //Supprimer un comment
    public function delete($commentId) 
    { 
        $commentManager = new CommentManager();
        $comment = $commentManager->getcomment($commentId);

        if (!empty($_comment)) {
            if ($commentManager->delete($commentId)) {
                header('Location: index.php');
                exit;
            }
            header('Location: index.php?objet=comment&action=delete&id=' . $commentId);            
        }

        $template = 'commentDelete';
        include '../view/layout.php';
    }

    //Affiche la list des comments
    public function displayAll()
    {   
        $commentManager = new CommentManager();
        $comments = $commentManager->getComments();
    }
}
