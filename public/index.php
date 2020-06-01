<?php

use App\Controller\Controller;

//spl_autoload_register
//routeur - si index.php tel conttroller si autre autre controller
    //appel du controller
        //requete base de donnée -> hydratation objet -> sera renvoyer à la vue
        //appel de la vue -> methode GET
        //renvoi vue + objet

require '../Autoloader/Autoloader.php';
Autoloader::register();

//Page d'accueil
if ('home' === $_GET['action']   || $_GET['action'] === '') {
        $controller = new Controller;
        $controller->home();
//Page Post
} elseif ($_GET['action'] === 'post') {
        $postController = new PostController;
        $postController->view($id);
}
