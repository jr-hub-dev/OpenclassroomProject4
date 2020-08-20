<?php 
    foreach($errors as $error){
        echo $error .'<br/>';
    }
?>
<form id="form" method="post">
    <label for="newBilletTitle">Titre du chapitre</label>
    <input id="title" type="text" name="title" id="newBilletTitle">

    <label for="newBilletTitle">Contenu</label>
    <textarea id="postContent" name="content" id="newBilletTitle"></textarea>
    <input type="submit" value="Valider" />
</form>
<script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=4m7auxcdz1rf5ukur3vjcxmehp4ct0sipvfcfaepgabstrjj"></script> 
<script>tinymce.init({selector:'textarea#postContent'});</script>