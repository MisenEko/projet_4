<?php 
/** ob_start with the content of the title and subtitle of the post */
ob_start();
?>

<header class="masthead" style="background-image: url('public/img/article_header.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1><?= htmlspecialchars($singlePost['title'])?></h1>
            <h2 class="subheading"></h2>
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
                        <?= nl2br($singlePost['content']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 col-md-9"></div>
                    <div class="col-lg-2 col-md-3">
                        <p> Ecrit par : <?= nl2br($singlePost['author']) ?></p>
                    </div>
                </div>
    </article>

    <div class="row">
      <div class="col-lg-8 col-md-8 mx-auto">
        <form action="comments.php?action=addComment&amp;id=<?= $singlePost['id'];?>" method="post">
            <div class="col-lg-6 col-md-8">
                <label>Votre pseudo :</label>
                </br>
                <input type="text" id="author" name="author">
            </div>

            <div class="col-lg-6 col-md-8">
                <label>Votre commentaire : </label>
                </br>
                <textarea id="content" name="content"></textarea>
            </div>

            <div class="col-lg-6 col-md-8">
            <button type="button" class="btn btn-info">Envoyer</button>
            </div>
        </form>
      </div>
    </div>

  
    <?php
    
    while($comments = $comment -> fetch()){?>  
            </br>  
            <div class="row">
                <div class="col-lg-6 col-md-8 mx-auto" style="background-color: #d0eaf2;">         
              <p>Auteur : <?= htmlspecialchars($comments['author']) ?></p>
              <p>Commentaire : <?= htmlspecialchars($comments['content']) ?></p>
              <!-- <em><a href="comments.php?action=editComment&amp;comment_id= $comments['id']">edit</a></em>  edit comments disable! --> 
              <em><a  style="color:red;" href="comments.php?action=reportComment&amp;comment_id=<?= $comments['id']?>&amp;post_id=<?=$singlePost['id']?>">signaler</a></em>
              </div>          
            </div>
            </br>


    <?php 
    } 
    $comment->closeCursor();
    ?>

</div>

<?php $content = ob_get_clean(); ?>
<?php require('PostView.php'); ?>