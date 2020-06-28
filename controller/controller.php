<?php

namespace App\Controller;

use App\Model\PostManager;

class Controller
{
    public function home()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();

        include_once('../view/home.php');
    }
    public function displayAll()
    {   
        $postManager = new PostManager();
        $posts = $postManager->getPosts();
        include '../Model/postsList.php';
    }
}
