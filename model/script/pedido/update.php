         

<?php
/*
_____________________________________________________________________________________________
- CREA UN ARCHIVO CON EL NOMBRE Y EXTENSION INDICADA.
- RUTA: proyect/model/script/pedido/update.php
*/
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include './../../dao/Mysql.php';
include './../../dao/PedidoDao.php';
$_entity = new PedidoDao();
if (isset($_POST['pedido_fecha']) and isset($_POST['pedido_cantidad']) and isset($_POST['usuario_id']) and  isset($_POST['pedido_id'])) {
$pedido_fecha = $_POST['pedido_fecha']; 
$pedido_cantidad = $_POST['pedido_cantidad']; 
$usuario_id = $_POST['usuario_id'];
$pedido_id = $_POST['pedido_id'];
$_entity->update($pedido_fecha, $pedido_cantidad, $usuario_id, $pedido_id);

echo json_encode(["Success"]);
} else {
echo json_encode([null]);
}
?>   