<?php
if ($admin === "admin"){
?>
    <form method="post">
    <label for='newBilletTitle'>Titre du chapitre</label>
    <input type='text' name='title' id='newBilletTitle' value="<?php if (isset($post)) echo $post->getTitle(); ?>" disabled="disabled">

    <label for='newBilletTitle'>Contenu</label>
    <textarea name='content' id='newBilletTitle' disabled="disabled"><?php if (isset($post)) echo $post->getContent(); ?></textarea>
    <input type="hidden" name="delete" value="delete" />
    <input type="submit" value="Valider" />
</form>
<?php } ?>