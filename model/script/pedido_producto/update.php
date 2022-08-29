                       
<?php
/*
_____________________________________________________________________________________________
- CREA UN ARCHIVO CON EL NOMBRE Y EXTENSION INDICADA.
- RUTA: proyect/model/script/pedido_producto/update.php
*/
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include './../../dao/Mysql.php';
include './../../dao/Pedido_productoDao.php';
$_entity = new Pedido_productoDao();
if (isset($_POST['pedido_producto_cantidad']) and isset($_POST['pedido_producto_precio']) and isset($_POST['pedido_id']) and isset($_POST['producto_id']) and  isset($_POST['pedido_producto_id'])) {
$pedido_producto_cantidad = $_POST['pedido_producto_cantidad']; 
$pedido_producto_precio = $_POST['pedido_producto_precio']; 
$pedido_id = $_POST['pedido_id']; 
$producto_id = $_POST['producto_id'];
$pedido_producto_id = $_POST['pedido_producto_id'];
$_entity->update($pedido_producto_cantidad, $pedido_producto_precio, $pedido_id, $producto_id, $pedido_producto_id);

echo json_encode(["Success"]);
} else {
echo json_encode([null]);
}
?>            
       