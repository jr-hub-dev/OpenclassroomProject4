<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController
{
    //Creation nouveau
    public function create()
    { 
        $userManager = new UserManager();
        $userId = $usertManager->create($_POST['userLogin'], $_POST['userPassword'], $_POST['userEmail']);

        header('Location: index.php?objet=post&action=view&id=' . $postId);
      
        $template = 'userCreate';
        include '../view/layout.php';
    }

    //Modifier un user
    public function modify($userId)
    { 
        $userManager = new UserManager();
        $user = $userManager->getPost($userId);

        if (!empty($_POST)) {
            if ($userManager->modify($userId)) {
                header('Location: index.php?objet=post&action=view&id=' . $userId);
            }            
        }

        $template = 'postModify';
        include '../view/layout.php';
    }

    //Supprimer un post
    public function delete($postId) 
    { 
        $usertManager = new UserManager();
        $post = $postManager->getUser($UserId);

        if (!empty($_POST)) {
            if ($userManager->delete($userId)) {
                header('Location: index.php');
                exit;
            }
            header('Location: index.php?objet=post&action=delete&id=' . $userId);            
        }

        $template = 'userDelete';
        include '../view/layout.php';
    }
}