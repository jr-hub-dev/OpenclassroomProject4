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