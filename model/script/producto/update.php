       

<?php
/*
_____________________________________________________________________________________________
- CREA UN ARCHIVO CON EL NOMBRE Y EXTENSION INDICADA.
- RUTA: proyect/model/script/producto/update.php
*/
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include './../../dao/Mysql.php';
include './../../dao/ProductoDao.php';
$_entity = new ProductoDao();
if (isset($_POST['producto_nombre']) and isset($_POST['producto_precio']) and isset($_POST['producto_descripcion']) and  isset($_POST['producto_id'])) {
$producto_nombre = $_POST['producto_nombre']; 
$producto_precio = $_POST['producto_precio']; 
$producto_descripcion = $_POST['producto_descripcion'];
$producto_id = $_POST['producto_id'];
$_entity->update($producto_nombre, $producto_precio, $producto_descripcion, $producto_id);

if(isset($_FILES['producto_img'])){
$producto_img = $_FILES['producto_img'];
if($producto_img['tmp_name'] != "" or $producto_img['tmp_name'] != null){
if(!file_exists('../../../view/src/files/producto_img')) {
mkdir("../../../view/src/files/producto_img", 0700);
}

$desde = $producto_img['tmp_name'];
$hasta = "../../../view/src/files/producto_img/".$producto_id.".png";
copy($desde, $hasta);
$_entity->updateProducto_img($producto_id.".png",$producto_id);
}
}
                        
echo json_encode(["Success"]);
} else {
echo json_encode([null]);
}
?>            
   