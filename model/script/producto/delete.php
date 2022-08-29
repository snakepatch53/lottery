
<?php
/*
_____________________________________________________________________________________________
- CREA UN ARCHIVO CON EL NOMBRE Y EXTENSION INDICADA.
- RUTA: proyect/model/script/producto/delete.php
*/
include './../../dao/Mysql.php';
include './../../dao/ProductoDao.php';
$_entity = new ProductoDao();
if(isset($_POST['producto_id'])){
$producto_id = $_POST['producto_id'];
$_entity->delete($producto_id);

if(file_exists("../../../view/src/files/producto_img/".$producto_id.".png")){
unlink("../../../view/src/files/producto_img/".$producto_id.".png");
}
                        
echo json_encode(["Success"]);
} else {
echo json_encode([null]);
}
?>