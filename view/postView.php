<?php
var_dump($post);
?>
<h1>
    Titre : <?php echo $post->getTitle(); ?>
</h1>
<p>
    Date de création :<?php echo $post->getCreationDate()->format('d/m/Y H:i:s'); ?>
</p>
<p>
    Contenu: <?php echo $post->getContent(); ?>
</p>
