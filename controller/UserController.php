<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController

{
    private $userClean = array();

    public function cleanData()
    {
        $errors = [];

        if (!empty($_POST)) {  
            $this->userClean = filter_var_array($_POST, FILTER_SANITIZE_STRING);
            if (!empty($this->userClean)) {
                if ('' === $this->userClean['userLogin']) {       
                    $errors[] = 'Veuillez entrer le titre du post';
                } elseif (strlen($this->userClean['userLogin']) < 5) {
                    $errors[] = 'Votre login doit faire plus de 5 lettres';
                }
                if ('' === $this->userClean['userPassword']) {
                    $errors[] = 'Veuillez entrer un mot de passe';
                }
                if ('' === $this->userClean['userEmail']) {
                    $errors[] = 'Veuillez entrer un email';
                }
            }
        }  
    var_dump($this->userClean);
    //die();
        return $errors;
    }
    

    public function view($userId)
    {
        $userManager = new UserManager();
        $user = $userManager->getUser($userId);

        $template = 'userView';
        include '../view/layout.php';
    }

    public function checkUser()
    {   
        if (!empty($this->userClean)) {
            if ('' === $this->userClean['userLogin']) {       
                $errors[] = 'Veuillez entrer le titre du post';
            } elseif (strlen($this->userClean['userLogin']) < 5) {
                $errors[] = 'Votre login doit faire plus de 5 lettres';
            }
            if ('' === $this->userClean['userPassword']) {
                $errors[] = 'Veuillez entrer un mot de passe';
            }

            $userManager = new UserManager();
            $userManager-> checkUser($userId);
            $template = 'header.php';
        }
    }

    //Creation nouveau
    public function create()
    { 
        $errors = $this->cleanData();

        if (!empty($this->userClean) && empty($errors)){

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

        $this->cleanData();

        if (!empty($_POST)) {
            if ($userManager->modify($userId)) {
                header('Location: index.php?objet=user&action=view&id=' . $userId);
            }            
        }

        $template = 'userModify';
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
            header('Location: index.php?objet=user&action=delete&id=' . $userId);            
        }

        $template = 'userDelete';
        include '../view/layout.php';
    }
}