       

<?php
/*
_____________________________________________________________________________________________
- CREA UN ARCHIVO CON EL NOMBRE Y EXTENSION INDICADA.
- RUTA: proyect/model/script/usuario/delete.php
*/
include './../../dao/Mysql.php';
include './../../dao/UsuarioDao.php';
$_entity = new UsuarioDao();
if(isset($_POST['usuario_id'])){
$usuario_id = $_POST['usuario_id'];
$_entity->delete($usuario_id);

if(file_exists("../../../view/src/files/usuario_foto/".$usuario_id.".png")){
unlink("../../../view/src/files/usuario_foto/".$usuario_id.".png");
}
                        
echo json_encode(["Success"]);
} else {
echo json_encode([null]);
}
?>
   