<!DOCTYPE html>
<html>
    <head>
        <title>Blog</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector: 'textarea'});</script>
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
    </body>
</html>