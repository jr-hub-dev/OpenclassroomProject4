<?php
session_start();
extract($_POST);
$login
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Blog</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" type="text/css" href="css/style.css"/>
    </head>

    <body>
    <?php
        require_once('header.php');
    ?>
    <?php include $template . '.php'; ?><br/>
    <?php
        require_once('footer.php');
    ?>
    <script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=4m7auxcdz1rf5ukur3vjcxmehp4ct0sipvfcfaepgabstrjj"></script>
    <script>tinymce.init({selector:'textarea#postContent'});</script>
    </body>
</html>