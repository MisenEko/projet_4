<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ob_start(); ?>

<h1>Affichage d'un article et des commentaires</h1>

<div>
    <h3> <?= htmlspecialchars($singlePost['title'])?></h3>
    <h2> <?= htmlspecialchars($singlePost['content']) ?></h2>

  
    <?php
    while($comments = $comment -> fetch()){?>  
            </br>  
            <div>                   
            <p>Auteur : <?= htmlspecialchars($comments['author']) ?></p>
            <p>Commentaire : <?= htmlspecialchars($comments['content']) ?></p>
            <em><a href="index.php?action=editComment&amp;comment_id=<?= $comments['id']?>">edit</a></em>
            
            </div>
            </br>
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