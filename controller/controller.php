<?php

namespace App\Controller;
use App\Model\PostManager;


class Controller
{
    public function home()
    {   
        $postManager = new PostManager();
        $post = $postManager->returnLast();

        $template = 'home';
        include '../view/layout.php';
    }
}
