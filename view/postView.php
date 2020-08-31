<h1>
    Titre : <?php echo $post->getTitle(); ?>
</h1>

    Contenu : <?php echo $post->getContent(); ?>
    Date de création :<?php echo $post->getCreationDate()->format('d/m/Y H:i:s'); ?>

<form method="post">
    <label for="comment">Commentaire</label>
    <textarea name="comment" id="comment"></textarea>
    <input type="submit" name="Ajouter" value="Ajouter">
</form>
<form method="post">
    <table>
        <tbody>
            <?php foreach ($comments as $comment) { ?> 
                <tr>
                    <td><?php  echo $comment->getContent(); ?></td>
                    <td><a href="index.php?objet=comment&action=alert&id=<?php echo $comment->getId(); ?>">Signaler</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</form>