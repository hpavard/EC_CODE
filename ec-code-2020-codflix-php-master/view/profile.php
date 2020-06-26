<?php
session_start();
unset($_SESSION['role']);
?>

<?php ob_start(); ?>

<?php
$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
$answer = $bdd->query('SELECT email, password FROM user');
while ($data = $answer->fetch())
{
    echo '<p>' . '- Adresse email :' . $data['email'] . '</p>';
    echo '<p>' . '- Mot de passe :' . $data['password'] . '</p>';
}
?>

<?php $content = ob_get_clean(); ?>
<?php require('dashboard.php'); ?>