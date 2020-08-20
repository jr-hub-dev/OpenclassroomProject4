<?php

namespace App\Controller;
use App\Model\PostController;
use App\Model\PostManager;


class Controller
{
    public function home()
    {   //quelque chose ds post_clean? faire un page de login
        $postManager = new PostManager();
        $post = $postManager->returnLast();

        /*$userManager = new UserManager();
        $userManager->checkUser();*/

        $template = 'home';
        include '../view/layout.php';
    }
}
//include '../view/postView.php';