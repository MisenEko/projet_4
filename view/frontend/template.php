<?php 
require("view/frontend/head.php");
?>


<!DOCTYPE html>
<html>
    <head>
        <?= $head ?>
    </head>
    
    <header>
        <form action="index.php?action=adminLogin" method="post">
        <label>Nom utilisateur : <input type="text" id="username" name="username"></label>
        <label>Mot de passe : <input type="password" id="pwd" name="pwd"></label>
        <input type="submit" value="Confirmer">
        
        </form>
    </header>
    <body>
       <?= $content ?>
    </body>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>

