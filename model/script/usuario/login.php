<?php
session_start();
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include './../../dao/Mysql.php';
include './../../dao/UsuarioDao.php';
$_entity = new UsuarioDao();
if (isset(
    $_POST['usuario_cedula'],
    $_POST['usuario_pass']
)) {
    $usuario_cedula = $_POST['usuario_cedula'];
    $usuario_pass = $_POST['usuario_pass'];
    $usuario_rs = $_entity->login($usuario_cedula, $usuario_pass);
    $usuario_r = mysqli_fetch_assoc($usuario_rs);
    if (mysqli_num_rows($usuario_rs) > 0) {
        if (
            $usuario_r['usuario_cedula'] == $usuario_cedula and
            $usuario_r['usuario_pass'] == $usuario_pass and
            $usuario_r['usuario_autorize'] == true
        ) {
            $_SESSION['usuario_id'] = $usuario_r['usuario_id'];
            $_SESSION['usuario_nombres'] = $usuario_r['usuario_nombres'];
            $_SESSION['usuario_apellidos'] = $usuario_r['usuario_apellidos'];
            $_SESSION['usuario_cedula'] = $usuario_r['usuario_cedula'];
            $_SESSION['usuario_telefono'] = $usuario_r['usuario_telefono'];
            $_SESSION['usuario_email'] = $usuario_r['usuario_email'];
            $_SESSION['usuario_genero'] = $usuario_r['usuario_genero'];
            $_SESSION['usuario_foto'] = $usuario_r['usuario_foto'];
            $_SESSION['usuario_nacimiento'] = $usuario_r['usuario_nacimiento'];
            $_SESSION['usuario_pass'] = $usuario_r['usuario_pass'];
            $_SESSION['usuario_autorize'] = $usuario_r['usuario_autorize'];
            $_SESSION['usuario_admin'] = $usuario_r['usuario_admin'];
            echo json_encode($usuario_r);
        } else {
            echo json_encode(false);
        }
    } else {
        echo json_encode(false);
    }
} else {
    echo json_encode(false);
}
