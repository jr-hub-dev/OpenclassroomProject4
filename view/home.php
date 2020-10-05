<?php
require_once('header.php');
?>

<body>
    <section id="landscape">

        <div id="draw">
            <h1 id="welcome"><?php if (array_key_exists('userLogin', $_SESSION)) {
                                    echo 'Bienvenue ' . $_SESSION['userLogin'];
                                } ?><h1>
            <h1 id="mainTitle">Aller simple pour l'Alaska </h1>

            <div id="lastChapter">
                <h2>Dernier chapitre </h2><?php echo $post->getTitle(); ?><?php echo $post->getContent(); ?>
            </div>
        </div>

    </section>
</body>
<?php
require_once('footer.php');
?>