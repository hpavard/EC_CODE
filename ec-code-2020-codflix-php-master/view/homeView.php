<?php
session_start();
$_SESSION['role'] = 'admin';
?>

<?php ob_start(); ?>

<div id="home">
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title">Cod<span>'Flix</span></h1>
                    <p><strong>Bienvenue</strong></p>
                </div>
            </div>
            <div class="row btn-container">
                <div class="col-md-6"><a href="index.php?action=login" class="btn btn-block bg-red">Connexion</a></div>
                <div class="col-md-6"><a href="index.php?action=signup" class="btn btn-block bg-blue">Inscription</a></div>
            </div>
            <!-- 
                Adding another row button container with a contact button on the inside at the bottom of the home page.
                I used the same existing CSS class as the title to make it placed in the center of the row.
            -->
            <div class="row btn-container">
                <div class="col-md-12"><a href="contact.php" class="btn btn-block">Nous contacter</a></div>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('base.php'); ?>
