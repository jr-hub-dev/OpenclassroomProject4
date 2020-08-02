<h1>
    Titre : <?php echo htmlspecialchars($post->getTitle()); ?>
</h1>
<p>
    Contenu : <?php echo htmlspecialchars($post->getContent()); ?>
    Date de création :<?php echo $post->getCreationDate()->format('d/m/Y H:i:s'); ?>
</p>

<form method="post">
    <label for="comment">Contenu</label>
    <textarea name="comment" id="comment"></textarea>
    <input type="submit" value="Ajouter" />
</form>

<?php foreach ($comments as $comment) { ?>
    <p>
        <?php  echo $comment->getContent(); ?>
    </p>
<?php } ?>

