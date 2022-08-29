<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include './../../dao/Mysql.php';
include './../../dao/UsuarioDao.php';
$_entity = new UsuarioDao();
if (isset(
    $_POST['usuario_nombres'],
    $_POST['usuario_apellidos'],
    $_POST['usuario_cedula'],
    $_POST['usuario_telefono'],
    $_POST['usuario_email'],
    $_POST['usuario_genero'],
    $_POST['usuario_nacimiento'],
    $_POST['usuario_pass'],
    $_POST['usuario_autorize'],
    $_POST['usuario_admin'],
    $_POST['usuario_id']
)) {
    $usuario_nombres = $_POST['usuario_nombres'];
    $usuario_apellidos = $_POST['usuario_apellidos'];
    $usuario_cedula = $_POST['usuario_cedula'];
    $usuario_telefono = $_POST['usuario_telefono'];
    $usuario_email = $_POST['usuario_email'];
    $usuario_genero = $_POST['usuario_genero'];
    $usuario_nacimiento = $_POST['usuario_nacimiento'];
    $usuario_pass = $_POST['usuario_pass'];
    $usuario_autorize = $_POST['usuario_autorize'];
    $usuario_admin = $_POST['usuario_admin'];
    $usuario_id = $_POST['usuario_id'];
    $_entity->update(
        $usuario_nombres,
        $usuario_apellidos,
        $usuario_cedula,
        $usuario_telefono,
        $usuario_email,
        $usuario_genero,
        $usuario_nacimiento,
        $usuario_pass,
        $usuario_autorize,
        $usuario_admin,
        $usuario_id
    );

    session_start();
    if (isset($_FILES['usuario_foto'])) {
        $usuario_foto = $_FILES['usuario_foto'];
        if ($usuario_foto['tmp_name'] != "" or $usuario_foto['tmp_name'] != null) {
            if (!file_exists('../../../view/src/files/usuario_foto')) {
                mkdir("../../../view/src/files/usuario_foto", 0700);
            }

            $desde = $usuario_foto['tmp_name'];
            $hasta = "../../../view/src/files/usuario_foto/" . $usuario_id . ".png";
            copy($desde, $hasta);
            $_entity->updateUsuario_foto($usuario_id . ".png", $usuario_id);
            if (isset($_SESSION['usuario_id'])) {
                $_SESSION['usuario_foto'] = $usuario_id . ".png";
            }
        }
    }

    if (isset($_SESSION['usuario_id'])) {
        $_SESSION['usuario_nombres'] = $usuario_nombres;
        $_SESSION['usuario_apellidos'] = $usuario_apellidos;
        $_SESSION['usuario_cedula'] = $usuario_cedula;
        $_SESSION['usuario_telefono'] = $usuario_telefono;
        $_SESSION['usuario_email'] = $usuario_email;
        $_SESSION['usuario_genero'] = $usuario_genero;
        $_SESSION['usuario_nacimiento'] = $usuario_nacimiento;
        $_SESSION['usuario_pass'] = $usuario_pass;
        $_SESSION['usuario_autorize'] = $usuario_autorize;
        $_SESSION['usuario_admin'] = $usuario_admin;
        $_SESSION['usuario_id'] = $usuario_id;
    }

    echo json_encode(true);
} else {
    echo json_encode(false);
}
