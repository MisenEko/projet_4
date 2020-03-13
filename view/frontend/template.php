<?php 

require("view/frontend/head.php");
require("model/showPost.php");



?>


<!DOCTYPE html>
<html>
    <head>
        <?= $head ?>
    </head>

    <body>
        <H3>TEST</H3>

        </br>

        <?php

        $reponse = getPosts();
        ?>

        <h3>Test de titre : <?php echo $reponse['title']; ?></h3>
    </body>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>

