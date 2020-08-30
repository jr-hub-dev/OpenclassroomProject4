<?php
    require_once('header.php');
?>
    
<body>
    <section id="landscape">

        <div id="draw">
			<img id ="image" src="./img/alaska2.png" alt="landscape">

            <h1 id="welcome"><?php if(array_key_exists('userLogin', $_SESSION)){
            echo 'Welcome ' . $_SESSION['userLogin'];
            }?><h1>
            <h1 id="ex">Aller simple pour l'Alaska </h1>
            <p>Le blog de Jean Forteroche :</p>

		</div>
                
    </section>
    <a title="Lien vers liste de posts" href="index.php?objet=post&action=postsList">Liste des posts</a></br>
    
    <p> Dernier chapitre <?php echo $post->getContent();?></p>
    
</body>
<?php
    require_once('footer.php');
?>