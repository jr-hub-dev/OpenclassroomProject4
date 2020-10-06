<?php
require_once('header.php');
?>

<body>
    <section id="landscape">

        <div id="draw">
            <h1 id="welcome"><?php if (array_key_exists('userLogin', $_SESSION)) {
                                    echo 'Bienvenue ' . $_SESSION['userLogin'];
                                } ?><h1>
                    <h2 id="mainTitle">Aller simple pour l'Alaska </h2>

                    <div id="lastChapter">
                    <h3>Retrouver ici le dernier chapitre de Jean Forteroche</h3>
                            <article class="chapter">
                                <?php echo $post->getTitle(); ?><?php echo $post->getContent(); ?>
                            </article>
                    </div>
        </div>

    </section>
</body>
<?php
require_once('footer.php');
?>