<?php
ob_start();
include('./model/library/initialProcess.php');
if (empty($_SESSION['usuario_id'])) {
?>
    <!DOCTYPE html>
    <html lang="<?= $proyect['lang'] ?>">

    <head>
        <?php include('./view/component.public/head.php') ?>
        <link rel="stylesheet" href="<?= $proyect['url'] ?>view/css.public/login.css">
        <title>Login</title>
    </head>

    <body>
        <?php include('./view/component.public/header.php') ?>
        <div class="container">
            <h1 class="text-center my-5 text-primary">INICIAR SESSION</h1>


            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="login-form mb-5">
                        <form class="row g-4" id="element-form-login">
                            <div class="col-12">
                                <label>Cédula:</label>
                                <input type="text" name="usuario_cedula" class="form-control" placeholder="Cédula">
                            </div>
                            <div class="col-12">
                                <label>Contraseña:</label>
                                <input type="password" name="usuario_pass" class="form-control" placeholder="Contraseña">
                            </div>
                            <div class="msg text-danger text-center" id="element-msg-login"></div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary w-100">Iniciar Sesion</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <?php include('./view/component.public/footer.php') ?>
    </body>
    <foot>
        <?php include('./view/component.public/foot.php') ?>
        <script src="<?= $proyect['url'] ?>control/script.public/login.js"></script>
    </foot>

    </html>
<?php
} else {
    header("location: ./profile");
}
?>