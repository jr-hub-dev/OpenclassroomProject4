<?php

namespace App\Controller;
use App\Model\PostController;


class Controller
{
    public function home()
    {
        $template = 'home';
        include '../view/layout.php';  
    }
}
