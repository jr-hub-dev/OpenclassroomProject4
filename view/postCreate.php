<?php
if ($admin === "admin") {
    //Génère les erreurs éventuelles
    foreach ($errors as $error) {
        echo $error . '<br/>';
    }
    require_once('tiny.php');
    ?>
    <section id="landscape2">
        <form id="form" method="post" enctype="multipart/form-data" action="upload.php">
            <label for="newBilletTitle">Titre du chapitre</label>
            <input id="title" type="text" name="title" id="newBilletTitle">

            <textarea class="postContent" name="content"></textarea>

            <input type="file" name="fichier" size="30">
            <input type="submit" name="upload" value="Uploader"><

            <input type="submit" value="Valider" />
        </form>
    </section>
<?php } ?>