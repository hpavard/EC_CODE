<?php
session_start();
unset($_SESSION['role']);
?>

<?php ob_start(); ?>

<div class="row">
    <div class="col-md-4 offset-md-8">
        <form method="get">
            <div class="form-group has-btn">
                <input type="search" id="search" name="title" value="<?= $search; ?>" class="form-control"
                placeholder="Rechercher un film ou une série">
                <button type="submit" class="btn btn-block bg-red">Valider</button>
            </div>
        </form>
    </div>
</div>

<div class="media-list">
    <?php foreach( $medias as $media ): ?>
        <a class="item" href="index.php?media=<?= $media['id']; ?>">
            <div class="video">
                <div>
                    <iframe allowfullscreen="" frameborder="0" src="<?= $media['trailer_url']; ?>" ></iframe>
                </div>
            </div>
            <div class="title"><?= $media['title']; ?></div>
        </a>
    <?php endforeach; ?>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>


<!--

Try to display media informations

<?php
session_start();
unset($_SESSION['role']);
?>

<?php ob_start(); ?>

<?php
$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
$answer = $bdd->query('SELECT genre_id, title, type, status, release_date, summary, trailer_url FROM media');
while ($data = $answer->fetch())
{
    echo '<p>' . '- Titre :' . $data['title'] . '</p>';
    echo '<p>' . '- Type :' . $data['type'] . '</p>';
    echo '<p>' . '- Statut :' . $data['status'] . '</p>';
    echo '<p>' . '- Date de sortie :' . $data['release_date'] . '</p>';
    echo '<p>' . '- Synopsis :' . $data['summary'] . '</p>';
    echo '<p>' . '- Bande annonce :' . $data['trailer_url'] . '</p>';
}
?>

<?php $content = ob_get_clean(); ?>
<?php require('dashboard.php'); ?>

-->
