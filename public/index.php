<?php

use App\Controller\Controller;
use App\Controller\PostController;


//spl_autoload_register
//routeur - si index.php tel conttroller si autre autre controller
    //appel du controller
        //requete base de donnée -> hydratation objet -> sera renvoyer à la vue
        //appel de la vue -> methode GET
        //renvoi vue + objet


spl_autoload_register(function ($class) {
    $class = '../' . str_replace("\\", '/', $class) . '.php';
    $class = str_replace("App/", '', $class);

    if (is_file($class)) {
    	require_once($class);
    } else {
    //throw new CustomException('Erreur interne de chargement');
    	var_dump($class);
        
	}
});

//Page d'accueil
if ('home' === $_GET['action'] || '' === $_GET['action']) {
    $controller = new Controller; 
    $controller->home();
//Page Post
} elseif ('post' === $_GET['objet']) {
    $postController = new PostController;
    if ('view' === $_GET['action']) {        
        $postController->view($_GET['id']);
    //Creation du post
    } elseif ('create' === $_GET['action']) {// objet ) post action =
        $postController->create();    
    } elseif ('modify' === $_GET['action']) {// objet ) post action =
        $postController->modify();
        //if action = create; if action
    }
}