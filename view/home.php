<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>

    <?php
        require_once('header.php');
    ?>
        
    <body> //dans layout
        <h1>Blog de </h1>
        <p>Ceci est la page d'accueil :</p>
        <?php foreach($posts as $post) { ?>
            <h2><?php echo $post->getTitle(); ?></h2>
        <?php } ?>

        
    </body>
    <?php
        require_once('footer.php');
    ?>
</html>