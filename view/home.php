
<?php
    require_once('header.php');
?>
    
<body>
    <section id="landscape">

        <div id="draw">
			<img id ="image" src="./img/alaska2.png" alt="landscape">

            <h1 id="welcome"><?php if(array_key_exists('userLogin', $_SESSION)){
            echo 'Bienvenue ' . $_SESSION['userLogin'] .$_SESSION['userLevel'] ;
            }?><h1>
            <h1 id="ex">Aller simple pour l'Alaska </h1>
            <p id="presentation">Le blog de Jean Forteroche</p>

		</div>
                
    </section>
    <section id="secondSection">
        <div id="lastChapter">     
            <p> Dernier chapitre <?php echo $post->getContent();?></p>
        </div>
        <a title="Lien vers liste de posts" href="index.php?objet=post&action=postsList">Liste des posts</a></br>
    </section>

</body>
<?php
    require_once('footer.php');
?>