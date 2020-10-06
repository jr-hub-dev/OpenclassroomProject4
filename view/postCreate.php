<?php
if ($admin === "admin") {
    //Génère les erreurs éventuelles
    foreach ($errors as $error) {
        echo $error . '<br/>';
    }
    require_once('tiny.php');
    ?>
    <section id="landscape2">
        <label for="newBilletTitle">Titre du chapitre</label>
        <input id="title" type="text" name="title" id="newBilletTitle">

        <textarea class="postContent" name="content"></textarea>
        <input type="submit" value="Valider" />
        </form>
    </section>
<?php } ?>