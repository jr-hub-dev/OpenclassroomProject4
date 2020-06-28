<?php

namespace App\Controller;

use App\Model\PostManager;

class PostController
{
    //Afficher vue
    public function view($id)
    {
        $postManager = new PostManager();
        $post = $postManager->getPost($id);

        $template = 'postView';
        include '../view/layout.php';
    }

    //Creation nouveau
    public function create()
    { 
        if (!empty($_POST)) {
            $postManager = new PostManager();
            $postId = $postManager->create($_POST['title'], $_POST['content']);

            header('Location: index.php?objet=post&action=view&id=' . $postId);
        }
        
        include '../Model/form.php';
    }
    public function modify()
    { 
        if (!empty($_POST)) {
            $postManager = new PostManager();
            $postId = $postManager->modify($_POST['title'], $_POST['content']);

            header('Location: index.php?objet=post&action=view&id=' . $postId);
        }

        include '../Model/form.php';
    }
    public function delete()
    { 
        if (!empty($_POST)) {
            $postManager = new PostManager();
            $postId = $postManager->delete($id);

            header('Location: index.php?objet=post&action=postsList&id=' . $postId);
        }
    }
}
