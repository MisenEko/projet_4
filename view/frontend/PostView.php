<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog de Forteroche - Alaska</title>

  <!-- Bootstrap core CSS -->
  <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="public/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php">Forteroche</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Page Principale</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('public/img/article_header.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1><?= htmlspecialchars($singlePost['title'])?></h1>
            <h2 class="subheading"></h2>
            <span class="meta">Mis en ligne par <?= htmlspecialchars($singlePost['author'])?>              
              <?= htmlspecialchars($singlePost['creation_date_fr'])?></span>
          </div>
        </div>
      </div>
    </div>
  </header> 

  <!-- Post Content -->
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
                <input type="text" id="author" name="author" required        
                  oninvalid="this.setCustomValidity('Votre pseudo est obligatoire.')"  
                  onchange="this.setCustomValidity('')"> <!--oninvalid = will send an error message if the field is empty // onchange = will reset the field with nothing inside it. -->
            </div>

            <div class="col-lg-6 col-md-8">
                <label>Votre commentaire : </label>
                </br>
                <textarea id="content" name="content" required        
                  oninvalid="this.setCustomValidity('Le champs de texte ne peut être vide.')"
                  onchange="this.setCustomValidity('')"></textarea>
            </div>

            <div class="col-lg-6 col-md-8">
            <button type="submit" class="btn btn-info">Envoyer</button>
            </div>
        </form>
      </div>
    </div>

  
    <?php
    
    while($comments = $comment -> fetch()){?>  
            </br>  
            <div class="row">
                <div class="col-lg-6 col-md-8 mx-auto" style="background-color: #d0eaf2;">         
              <p><?= htmlspecialchars($comments['author']) ?></p>
              <p>Commentaire :</p>
              <p> <?= htmlspecialchars($comments['content']) ?></p>
              <!-- <em><a href="comments.php?action=editComment&amp;comment_id= $comments['id']">edit</a></em>  edit comments disable! --> 
              <em><a  style="color:red;" href="comments.php?action=reportComment&amp;comment_id=<?= $comments['id']?>&amp;post_id=<?=$singlePost['id']?>">signaler</a></em>
              </div>          
            </div>
            </br>


    <?php 
    }   
    ?>

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy;Forteroche</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
