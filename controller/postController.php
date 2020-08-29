<?php

namespace App\Controller;

use App\Model\PostManager;

class PostController
{
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
        if (!empty($_POST)) {
            if($_POST['title'] ===''){
                echo 'Veuillez entrer le titre du post';
            }
            if ($_POST['title'] ===''){
                echo 'Veuillez entrer un contenu';
            }else{
                $postManager = new PostManager();
                $postId = $postManager->create($_POST['title'], $_POST['content']);

                header('Location: index.php?objet=post&action=view&id=' . $postId);
            }
        }
        
        $template = 'postCreate';
        include '../view/layout.php';
    }

    //Modifier un post
    public function modify($postId)
    { 
        $postManager = new PostManager();
        $post = $postManager->getPost($postId);

        if (!empty($_POST)) {
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
