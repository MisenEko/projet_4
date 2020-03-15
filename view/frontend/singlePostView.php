<?php ob_start(); ?>

<h1>Affichage d'un article et des commentaires</h1>

<div>
    <h3> <?= htmlspecialchars($singlePost['title'])?></h3>
    <h2> <?= htmlspecialchars($singlePost['content']) ?></h2>

    <form action="index.php?action=addComment&amp;id=<?= $singlePost['id'];?>" method="post">
        <div>
            <label>Votre pseudo :</label>
            </br>
            <input type="text" id="pseudo" name="pseudo">
        </div>

        <div>
            <label>Votre commentaire : </label>
            </br>
            <input type="text" id="content" name="content">
        </div>

        <div>
            <input type="submit"> 
        </div>
    </form>

</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>