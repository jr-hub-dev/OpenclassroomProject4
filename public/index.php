<?php

use App\Controller\Controller;
use App\Controller\PostController;
use App\Controller\UserController;


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
if (!isset($_GET['action']) || 'home' === $_GET['action'] || '' === $_GET['action']) {
    $controller = new Controller; 
    $controller->home();
//Page Post
} elseif ('post' === $_GET['objet']) {
    $postController = new PostController;
    if ('view' === $_GET['action']) {        
        $postController->view($_GET['id']);
    //Creation du post
    } elseif ('create' === $_GET['action']) {
        $postController->create();
    //Modification du post  
    } elseif ('modify' === $_GET['action']) {
        $postController->modify($_GET['id']);
    //Suppression du post
    } elseif ('delete' === $_GET['action']) {
        $postController->delete($_GET['id']);
    }
    //Affiche liste des posts
    elseif ('postsList' === $_GET['action']) {
        $postController->displayAll();
    }
        //Affiche liste des posts
    elseif ('postsList' === $_GET['action']) {
        $postController->displayAll();
    }
} elseif ('user' === $_GET['objet']) {
    $userController = new UserController;
} if ('create' === $_GET['action']) {        
    $userController->create();
}