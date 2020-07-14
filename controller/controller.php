<?php

namespace App\Controller;

use App\Model\PostManager;
use App\Model\UserManager;

class Controller
{
    public function home()
    {
        $template = 'home';
        include '../view/layout.php';        
    }
}
