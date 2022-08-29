<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include './../../dao/Mysql.php';
include './../../dao/Pedido_productoDao.php';
$_entity = new Pedido_productoDao();
if (isset(
    $_POST['pedido_producto_cantidad'],
    $_POST['pedido_producto_precio'],
    $_POST['pedido_id'],
    $_POST['producto_id']
)) {
    $pedido_producto_cantidad = $_POST['pedido_producto_cantidad'];
    $pedido_producto_precio = $_POST['pedido_producto_precio'];
    $pedido_id = $_POST['pedido_id'];
    $producto_id = $_POST['producto_id'];
    $_entity->insert($pedido_producto_cantidad, $pedido_producto_precio, $pedido_id, $producto_id);

    echo json_encode(true);
} else {
    echo json_encode(false);
}
