<body>
    <table>
        <?php foreach($posts as $post) { ?>
            <tr>
                <td><?php echo $post->getTitle(); ?></td>
                <td><?php echo $post->getContent(); ?></td>
                <td><?php echo $post->getId(); ?></td>
                <td><a href="index.php?objet=post&action=modify&id=<?php echo $post->getId(); ?>" title="modifier <?php echo $post->getTitle(); ?> - <?php echo $post->getId(); ?>">Modifier</a></td>
                <td><a href="index.php?objet=post&action=delete&id=<?php echo $post->getId(); ?>" title="supprimer <?php echo $post->getTitle(); ?> - <?php echo $post->getId(); ?>">Supprimer</a></td>
            </tr>
        <?php } ?>
    </table>
</body>