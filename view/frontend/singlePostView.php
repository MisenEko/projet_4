<?php 
/** ob_start with the content of the title and subtitle of the post */
ob_start();
?>

<header class="masthead" style="background-image: url('public/img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1><?= htmlspecialchars($singlePost['title'])?></h1>
            <h2 class="subheading">-- no subtitle --</h2>
            <span class="meta">Posted by <?= htmlspecialchars($singlePost['author'])?>
              <a href="#">Start Bootstrap</a>
              <?= htmlspecialchars($singlePost['creation_date_fr'])?></span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <?php
    $header = ob_get_clean()
    ?>

<?php  

/**  ob_start with the content of the post and all the commentaries.*/

ob_start(); ?>
<div>
    <h3> </h3>
    <article>
                <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <?= nl2br(htmlspecialchars($singlePost['content'])) ?>
                    </div>
                </div>
                </div>
    </article>

  
    <?php
    while($comments = $comment -> fetch()){?>  
            </br>  
            <div>                   
            <p>Auteur : <?= htmlspecialchars($comments['author']) ?></p>
            <p>Commentaire : <?= htmlspecialchars($comments['content']) ?></p>
            <em><a href="comments.php?action=editComment&amp;comment_id=<?= $comments['id']?>">edit</a></em>
            <em><a href="comments.php?action=reportComment&amp;comment_id=<?= $comments['id']?>">signaler</a></em>
            </div>
            </br>


    <?php 
    } 
    $comment->closeCursor();
    ?>



    <form action="comments.php?action=addComment&amp;id=<?= $singlePost['id'];?>" method="post">
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
<?php require('PostView.php'); ?>