<?php
session_start();
unset($_SESSION['role']);
?>

<?php ob_start(); ?>

<div class="row">
</div>


<?php $content = ob_get_clean(); ?>
<?php require('dashboard.php'); ?>