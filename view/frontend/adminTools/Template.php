<?php

if (isset($_SESSION['login']) && isset($_SESSION['password'])) { ?>

<!doctype html>
<html lang="en">

<head>
  <title>Blog Alaska</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="public/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
</head>

<body>
  <div class="wrapper ">

  <div class="sidebar" data-color="purple" data-background-color="white">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="http://jfourquet.com/projet_4" class="simple-text logo-mini">
          Blog Alaska
        </a>
        <a href="http://jfourquet.com/projet_4" class="simple-text logo-normal">
          Forteroche
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="">
              <i class="material-icons">dashboard</i>
              <p>Tableau de bord</p>
            </a>
          </li>
          <!-- add article -->
          <li class="nav-item ">
            <a class="nav-link" href="view/frontend/adminTools/AddArticles.php">
              <i class="material-icons">+</i>
              <p>Ajouter un article</p>
            </a>
          </li>
          <!-- edit articles-->
          <li class="nav-item ">
            <a class="nav-link" href="posts.php?action=editPosts"> 
              <i class="material-icons">+</i>
              <p>Editer un article</p>
            </a>
          </li>
          <!-- comment manager -->
          <li class="nav-item   ">
            <a class="nav-link" href="comments.php?action=showReportComment"> 
              <i class="material-icons">+</i>
              <p>Commentaires signaler</p>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Tableau de bord</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="view/frontend/adminTools/logout.php">se déconnecter</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          
          <!-- pop up to show if a comments is report or not -->
          <?php if($count > 0) {?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong><?= $count ?> </strong> <a href='comments.php?action=showReportComment'>commentaire(s) en attente d'être modéré.</a>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } else { ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
              <a href='comments.php?action=showReportComment'>Aucun commentaire(s) signalé(s)</a>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

         <?php } ?>


        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
              </li>
            </ul>
          </nav>

          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>



  <!--   Core JS Files   -->
<script src="public/js/core/jquery.min.js" type="text/javascript"></script>
<script src="public/js/core/popper.min.js" type="text/javascript"></script>
<script src="public/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="public/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chartist JS -->
<script src="public/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="public/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="public/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>


</body>



</html>

<?php }
  else {
    echo 'Vous n\'êtes pas autorisé à voir cette page, si ce problème est survenu après avoir entré vos identifiant, contacter le développeur.';
  }
?>
