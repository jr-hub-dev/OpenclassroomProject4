<?php
//if($_SESSION['userLevel'] ="admin" && $_SESSION['userLevel'] ="admin");


if (array_key_exists('userLogin', $_SESSION)) {//a mettre devant la ligne concernée
    var_dump('you are logged in');
    var_dump($_SESSION['userLogin']);
    var_dump($_SESSION['userLevel']);

    ?>  
   <?php if ($_SESSION['userLevel'] == 'admin') { ?>
       <a href= 'index.php?objet=post&action=create'>Ecrire un nouveau chapitre</a>;
   <?php } ?>
    <table>
        <tbody>
            <?php foreach($posts as $post) { ?>
                <tr>
                    <td><a href="index.php?objet=post&action=view&id=<?php echo $post->getId(); ?>" title="afficher <?php echo $post->getTitle(); ?> - <?php echo $post->getId(); ?>"><?php echo $post->getTitle();?></a></td>
                    <td><?php echo $post->getContent(); ?></td>
                    <?php if($_SESSION['userLevel'] === 'admin') { ?> // à doubler
                        <td>
                            <a href="index.php?objet=post&action=modify&id=<?php echo $post->getId(); ?>" title="modifier <?php echo $post->getTitle(); ?> - <?php echo $post->getId(); ?>">Modifier</a>
                        </td>
                    <?php } ?>
                    <?php if($_SESSION['userLevel'] === 'admin') { ?> // à doubler
                        <td>    
                            <a href="index.php?objet=post&action=delete&id=<?php echo $post->getId(); ?>" title="supprimer <?php echo $post->getTitle(); ?> - <?php echo $post->getId(); ?>">Supprimer</a></td>;
                        </td>
                    <?php } ?>
                </tr>    
            <?php } ?>                
        </tbody>
    </table>
    <form method="post">
        <a href="index.php?objet=user&action=logout">Logout</a>
    </form
<?php } else { ?>
    Vous devez vous identifier pour accéder à cette page
    <br />
    <a  href="index.php?objet=user&action=login">Se connecter</a>
    <?php
        session_destroy();

    }?>
