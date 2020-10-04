<?php

if ($admin === "admin"){
    foreach($errors as $error){
        echo $error .'<br/>';
    }
    require_once('tiny.php');
?>
    <form method='post'>
        <label for='newBilletTitle'>Titre du chapitre</label>
        <input type='text' name='title' id='newBilletTitle' value="<?php if (isset($post)) echo $post->getTitle(); ?>">

        <label for='newBilletTitle'>Contenu</label>
        <textarea name='content' id='postContent'><?php if (isset($post)) echo $post->getContent(); ?></textarea>
        <input type="submit" value="Valider" />
    </form>
<?php } ?>