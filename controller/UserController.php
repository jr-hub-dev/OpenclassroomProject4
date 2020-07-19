<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController

{
    private $userClean = array();

    public function cleanData()
    {
        if (!empty($_POST)) {  
            $this->userClean = filter_var_array($_POST, FILTER_SANITIZE_STRING);
            if (!empty($this->userClean)) {
                if ($this->userClean['userLogin'] === '') {
                    echo 'Veuillez entrer un login';
                    exit;
                } elseif (strlen($this->userClean['userLogin']) < 5) {
                    echo 'Votre login doit faire plus de 5 lettres';
                    exit;
                } elseif ($this->userClean['userPassword'] === '') {
                    echo 'Veuillez entrer un password';
                    exit;
                } elseif (strlen($this->userClean['userPassword']) < 8) {
                    echo 'Votre password doit faire 8 caractères ou plus';
                }
            } elseif ($this->userClean['userEmail'] === '') {
                echo 'Veuillez entrer un email';
                exit;
            }
        }
    }

    public function view($userId)
    {
        $userManager = new UserManager();
        $user = $userManager->getUser($userId);

        $template = 'userView';
        include '../view/layout.php';
    }

    //Creation nouveau
    public function create()
        { 
            $this->cleanData();

            if (!empty($this->postClean)) {

                $userManager = new UserManager();
                $userId = $userManager->create($this->userClean);

                header('Location: index.php?objet=user&action=view&id=' . $userId);
            }
        
            $template = 'userCreate';
            include '../view/layout.php';
    }

    //Modifier un user
    public function modify($userId)
    { 
        $userManager = new UserManager();
        $user = $userManager->getUser($userId);

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