<?php
if ($admin === "admin"){
        //Génère les erreurs éventuelles
        foreach($errors as $error){
            echo $error .'<br/>';
        }
        require_once('tiny.php');
    ?>
<<<<<<< HEAD
    <form id="form" method="post">
        <label for="newBilletTitle">Titre du chapitre</label>
        <input id="title" type="text" name="title" id="newBilletTitle">
        <label for="newBilletTitle">Contenu</label>
        <textarea id="postContent" name="content" id="newBilletTitle"></textarea>
        <input type="submit" value="Valider" />
    </form>
=======
    <section id="landscape2">
            <label for="newBilletTitle">Titre du chapitre</label>
            <input id="title" type="text" name="title" id="newBilletTitle">

            <textarea class="postContent" name="content"></textarea>
            <input type="submit" value="Valider" />
        </form>
    </section>
>>>>>>> dev
<?php } ?>