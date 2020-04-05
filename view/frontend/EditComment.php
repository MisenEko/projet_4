<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ob_start(); ?>

<h1>Votre commentaire à éditer</h1>

<div>
    
    <h2> <?= htmlspecialchars($contents['content']) ?></h2>

    <form action="comments.php?action=editComment&amp;edit_id=<?= $comId?>" method="post">

        <div>
            <label>Votre commentaire : </label>
            </br>
            <input type="text" id="editContent" name="editContent" value="<?= $contents['content']?>">
        </div>

        <div>
            <input type="submit"> 
        </div>
    </form>

</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>