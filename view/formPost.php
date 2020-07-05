<?php
    require_once('header.php');
?>
<form method='post'>
    <label for='newBilletTitle'>Titre du chapitre</label>
    <input type='text' name='title' id='newBilletTitle' value="<?php if (isset($post)) echo $post->getTitle(); ?>" <?php if ($_POST['action'] === 'delete') echo 'disabled="disabled"'; ?>>

    <label for='newBilletTitle'>Contenu</label>
    <textarea name='content' id='newBilletTitle'><?php if (isset($post)) echo $post->getContent(); ?></textarea>
    <input type="submit" value="Valider" />
</form>
<?php
    require_once('footer.php');
?>
