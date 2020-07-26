<h1>
    Titre : <?php echo htmlspecialchars($post->getTitle()); ?>
</h1>
<p>
    Date de création :<?php echo $post->getCreationDate()->format('d/m/Y H:i:s'); ?>
</p>

<form method="post">
    <label for="newComment">Contenu</label>
    <textarea name="content" id="newComment"></textarea>
    <input type="submit" value="Ajouter" />
</form>

<p>
    Quelqu'un a fait un comentaire: <?php  echo $comment->getContent(); ?>
</p>

