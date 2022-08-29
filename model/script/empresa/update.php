      

<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include './../../dao/Mysql.php';
include './../../dao/EmpresaDao.php';
$_entity = new EmpresaDao();
if (isset($_POST['empresa_nombre']) and isset($_POST['empresa_ubicacion']) and isset($_POST['empresa_horario_atencion']) and isset($_POST['empresa_telefono']) and isset($_POST['empresa_email']) and  isset($_POST['id_empresa'])) {
$empresa_nombre = $_POST['empresa_nombre']; 
$empresa_ubicacion = $_POST['empresa_ubicacion']; 
$empresa_horario_atencion = $_POST['empresa_horario_atencion']; 
$empresa_telefono = $_POST['empresa_telefono']; 
$empresa_email = $_POST['empresa_email'];
$id_empresa = $_POST['id_empresa'];
$_entity->update($empresa_nombre, $empresa_ubicacion, $empresa_horario_atencion, $empresa_telefono, $empresa_email, $id_empresa);

echo json_encode(["Success"]);
} else {
echo json_encode([null]);
}
?> 