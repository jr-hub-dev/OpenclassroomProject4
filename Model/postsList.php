<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
    </head>

    <body>
    <?php foreach($posts as $post) { ?>
        <tr>
            <td><?php echo $post->getTitle(); ?></td>
            <td><?php echo $post->getContent(); ?></td>
            <td><?php echo $post->getId(); ?></td>
        </tr>
        <?php } ?>
    </body>
</html>