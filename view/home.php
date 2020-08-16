<?php
    require_once('header.php');
?>
    
<body>
    <section id="landscape">
        <h1 id="ex">Aller simple pour l'Alaska </h1>
        <p>Le blog de Jean Forteroche :</p>
    </section>
    <a title="Lien vers liste de posts" href="index.php?objet=post&action=postsList">Liste des posts</a></br>
    
    Dernier chapitre <?php echo $post->getContent();?>
    
</body>
<?php
    require_once('footer.php');
?>