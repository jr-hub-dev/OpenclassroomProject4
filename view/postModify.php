<form method='post'>
    <label for='newBilletTitle'>Titre du chapitre</label>
    <input type='text' name='title' id='newBilletTitle' value="<?php if (isset($post)) echo $post->getTitle(); ?>">

    <label for='newBilletTitle'>Contenu</label>
    <textarea name='content' id='newBilletTitle'><?php if (isset($post)) echo $post->getContent(); ?></textarea>
    <input type="submit" value="Valider" />
</form>
<script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=4m7auxcdz1rf5ukur3vjcxmehp4ct0sipvfcfaepgabstrjj"></script> 
<script>tinymce.init({selector:'textarea#postContent'});</script> <!---faire un template-->
