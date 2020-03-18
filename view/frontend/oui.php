<?php ob_start(); ?>
<p>oui</p>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>