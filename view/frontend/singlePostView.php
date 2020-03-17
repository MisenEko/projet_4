<?php ob_start(); ?>

<h1>Affichage d'un article et des commentaires</h1>

<div>
    <h3> <?= htmlspecialchars($singlePost['title'])?></h3>
    <h2> <?= htmlspecialchars($singlePost['content']) ?></h2>

  
    <?php
    while($data = $comment -> fetch()){?>  
            <div>          
            <p>Auteur : <?= htmlspecialchars($data['author']) ?></p>
            <p>Commentaire : <?= htmlspecialchars($data['content']) ?></p>
            </div>
    <?php 
    } 
    $comment->closeCursor();
    ?>



    <form action="index.php?action=addComment&amp;id=<?= $singlePost['id'];?>" method="post">
        <div>
            <label>Votre pseudo :</label>
            </br>
            <input type="text" id="author" name="author">
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