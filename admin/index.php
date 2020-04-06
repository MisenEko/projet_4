<?php ob_start()
?>

<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <form action="../login.php?action=adminLogin" method="post">
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Idéntifiant Administrateur</label>
              <input type="text" class="form-control" placeholder="admin login" id="username" name="username" required data-validation-required-message="Ce champ doit être rempli.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Mot de passe</label>
              <input type="password" class="form-control" placeholder="Mot de passe" id="pwd" name="pwd" required data-validation-required-message="Ce champ doit être rempli.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Envoyer</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php $adminContent = ob_get_clean() ?>
  <?php require('../view/frontend/AdminDashboard.php');