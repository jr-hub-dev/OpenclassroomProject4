<form method='post'>
    <label for='newBilletTitle'>Titre du chapitre</label>
    <input type='text' name='title' id='newBilletTitle' value="<?php if (isset($post)) echo $post->getTitle(); ?>" disabled>

    <label for='newBilletTitle'>Contenu</label>
    <textarea disabled name='content' id='newBilletTitle'><?php if (isset($post)) echo $post->getContent(); ?></textarea>
    <input type="submit" value="Valider" />
</form>