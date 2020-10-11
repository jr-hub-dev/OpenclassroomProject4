<?php
if (array_key_exists('userLogin', $_SESSION)) { ?>
    <?php if ($_SESSION['userLevel'] == 'admin') { ?>
        <section id="landscape">
            <table>
                <tbody>
                    <?php foreach ($comments as $comment) { ?>
                        <tr>
                            <td><?php echo $comment->getContent(); ?></td>
                            
                            <td><a class="button" href="index.php?objet=comment&action=delete&id=<?php echo $comment->getId(); ?>" title="supprimer - <?php echo $comment->getId(); ?>">Supprimer</a></td>
                            
                        <?php } ?>
                        </tr>
                        
                    <?php } ?>
                </tbody>
            </table>
        </section>
    <?php } else { ?> Vous devez vous identifier pour accéder à cette page <br />
        <a href="index.php?objet=user&action=login">Se connecter</a>
    <?php
        session_destroy();
    } ?>