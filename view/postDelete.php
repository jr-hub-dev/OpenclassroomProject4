<?php
if ($admin === "admin"){
    ?>
    <form class="postUpdate" method="post">
        <input type='text' name='title' id='newBilletTitle' value="<?php if (isset($post)) echo $post->getTitle(); ?>" disabled="disabled"><br>

        <textarea name='content' class="postContent" disabled="disabled"><?php if (isset($post)) echo $post->getContent(); ?></textarea>
        <input type="hidden" name="delete" value="delete" />
        <input type="submit" value="Valider" />
    </form>
<?php } ?>