           

<?php
/*
_____________________________________________________________________________________________
- CREA UN ARCHIVO CON EL NOMBRE Y EXTENSION INDICADA.
- RUTA: proyect/model/script/pedido_producto/selectById.php
*/
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include './../../dao/Mysql.php';
include './../../dao/Pedido_productoDao.php';
$_entity = new Pedido_productoDao();
if (isset($_POST['pedido_producto_id'])) {
$pedido_producto_id = $_POST['pedido_producto_id'];
$rs = $_entity->selectById($pedido_producto_id);
$array = array();
while($r = mysqli_fetch_assoc($rs)) {
$array[] = $r;
}
echo json_encode($array);
} else {
echo json_encode([null]);
}
?>
          