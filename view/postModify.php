<?php
if ($admin === "admin") {
    foreach ($errors as $error) {
        echo $error . '<br/>';
    }
    require_once('tiny.php');
    ?>
    <form class="postUpdate" method='post'>
        <input type='text' name='title' id='newBilletTitle' value="<?php if (isset($post)) echo $post->getTitle(); ?>">

        <textarea name='content' class="postContent"><?php if (isset($post)) echo $post->getContent(); ?></textarea>
        <input type="submit" value="Valider" />
    </form>
<?php } ?>