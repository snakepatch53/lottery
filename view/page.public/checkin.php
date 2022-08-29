<?php
ob_start();
include('./model/library/initialProcess.php');
if (empty($_SESSION['usuario_id'])) {
?>
    <!DOCTYPE html>
    <html lang="<?= $proyect['lang'] ?>">

    <head>
        <?php include('./view/component.public/head.php') ?>
        <title>Registrarse</title>
    </head>

    <body>
        <?php include('./view/component.public/header.php') ?>
        <div class="container my-5 text-primary">
            <h1 class="text-center">FORMULARIO DE REGISTRO</h1>
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
    header("location: ./profile");
}
?>