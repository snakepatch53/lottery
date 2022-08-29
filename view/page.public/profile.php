<?php
ob_start();
include('./model/library/initialProcess.php');
if (isset($_SESSION['usuario_id'])) {
?>
    <!DOCTYPE html>
    <html lang="<?= $proyect['lang'] ?>">

    <head>
        <?php include('./view/component.public/head.php') ?>
        <title>Perfil de Usuario</title>
    </head>

    <body>
        <?php include('./view/component.public/header.php') ?>
        <div class="container my-5 text-primary">
            <img class="user-profile-photo d-block mx-auto border border-2 border-primary rounded-circle" src="<?= $usuario_foto ?>" alt="<?= $usuario_nombres ?>">
            <h1 class="text-center"><?= $usuario_nombres . " " . $usuario_apellidos ?></h1>
        </div>
        <?php include('./view/component.public/checkin.php') ?>
        <?php include('./view/component.public/footer.php') ?>
    </body>

    <foot>
        <?php include('./view/component.public/foot.php') ?>
    </foot>

    </html>
<?php
} else {
    header("location: ./login");
}
?>