<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include './../../dao/Mysql.php';
include './../../dao/UsuarioDao.php';
include '../../../config.php';
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
    $_POST['usuario_admin']
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

    $_entity->insert(
        $usuario_nombres,
        $usuario_apellidos,
        $usuario_cedula,
        $usuario_telefono,
        $usuario_email,
        $usuario_genero,
        $usuario_nacimiento,
        $usuario_pass,
        $usuario_autorize,
        $usuario_admin
    );

    if (isset($_FILES['usuario_foto'])) {
        $usuario_foto = $_FILES['usuario_foto'];
        if ($usuario_foto['tmp_name'] != "" or $usuario_foto['tmp_name'] != null) {
            if (!file_exists('../../../view/src/files/usuario_foto')) {
                mkdir("../../../view/src/files/usuario_foto", 0700);
            }

            $usuario_id = $_entity->getLastId();
            $desde = $usuario_foto['tmp_name'];
            $hasta = "../../../view/src/files/usuario_foto/" . $usuario_id . ".png";
            copy($desde, $hasta);
            $url = $usuario_id . ".png";
            $_entity->updateUsuario_foto($url, $usuario_id);
        }
    }

    echo json_encode(true);
} else {
    echo json_encode(false);
}
