<?php ob_start(); ?>
<p>non</p>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>