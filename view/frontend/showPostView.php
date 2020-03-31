

<?php 


ob_start(); 

?>

    <?php
while ($data = $posts->fetch())
{ ?>
    <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
          <a href="posts.php?action=post&amp;id=<?= $data['id'] ?>">
            <h2 class="post-title">
                <?= htmlspecialchars($data['title']) ?>
            </h2>
            <h3 class="post-subtitle">
                <?= nl2br($data['post_sample']) ?>
            </h3>
          </a>
          <p class="post-meta">Ecrit par
            <a href="#"><?= nl2br(htmlspecialchars($data['author'])) ?></a>
            <em>le <?= $data['creation_date_fr'] ?></em></p>
        </div>
        <hr>
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="posts.php?action=post&amp;id=<?= $data['id'] ?>">Lire la suite. &rarr;</a>
        </div>
      </div>
    </div>
  </div>


<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>


<?php require('main.php'); ?>