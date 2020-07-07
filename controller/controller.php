<?php

namespace App\Controller;

use App\Model\PostManager;

class Controller
{
    public function home()
    {
        $template = 'home';
        include '../view/layout.php';        
    }
}
