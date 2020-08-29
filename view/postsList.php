<a href= 'index.php?objet=post&action=create'>Ecrire un nouveau chapitre</a>

<?php
$_SESSION['userLogin'] ="jerome";
echo $_SESSION['userLogin'];

if(array_key_exists('userLogin', $_SESSION)){ //a mettre devant la ligne concernée
    var_dump('you are logged in');
    ?>  
    <table>
        <tbody>
            <?php foreach($posts as $post) { ?>
                <tr>
                    <td></td>
                    <td><a href="index.php?objet=post&action=view&id=<?php echo $post->getId(); ?>" title="modifier <?php echo $post->getTitle(); ?> - <?php echo $post->getId(); ?>"><?php echo $post->getTitle();?></a></td>
                    <td><?php echo $post->getContent(); ?></td>
                    <td><?php echo $post->getId(); ?></td>
                    <td><a href="index.php?objet=post&action=modify&id=<?php echo $post->getId(); ?>" title="modifier <?php echo $post->getTitle(); ?> - <?php echo $post->getId(); ?>">Modifier</a></td>
                    <td><a href="index.php?objet=post&action=delete&id=<?php echo $post->getId(); ?>" title="supprimer <?php echo $post->getTitle(); ?> - <?php echo $post->getId(); ?>">Supprimer</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <form method="post" >
        <input type="submit" value="Se déconnecter">
    </form
<?php } else{
    var_dump('you are not logged in');
}       
?>
