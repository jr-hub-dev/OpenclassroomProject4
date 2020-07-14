<?php

namespace App\Controller;

class Controller
{
    public function home()
    {
        $template = 'home';
        include '../view/layout.php';        
    }
}
