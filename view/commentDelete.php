<?php
//if ($admin === "admin") {
    ?>
    <section id="landscape2">
        <form class="postUpdate" method="post">
            <textarea name='content' class="commentContent" disabled="disabled"><?php if (isset($comment)) echo $comment->getContent(); ?></textarea>
            <input type="hidden" name="delete" value="delete" />
            <input type="submit" value="Valider" />
        </form>
    </section>
<?php //} ?>