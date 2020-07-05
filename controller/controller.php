<?php

namespace App\Controller;

use App\Model\PostManager;

class Controller
{
    public function home()
    {
        include_once('../view/home.php');
    }
    public function displayAll()
    {   
        $postManager = new PostManager();
        $posts = $postManager->getPosts();
        include '../view/postsList.php';
    }
}
