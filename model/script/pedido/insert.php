<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include './../../dao/Mysql.php';
include './../../dao/PedidoDao.php';
include './../../dao/Pedido_productoDao.php';
include './../../dao/ProductoDao.php';
$pedidoDao = new PedidoDao();
$pedido_productoDaoDao = new Pedido_productoDao();
$productoDao = new ProductoDao();
if (isset(
    $_POST['product_list'],
    $_POST['usuario_id']
)) {
    $pedido_fecha = date('Y-m-d');
    $product_list = json_decode($_POST['product_list'], true);
    $usuario_id = $_POST['usuario_id'];
    $pedidoDao->insert($pedido_fecha, $usuario_id);
    $pedido_id = $pedidoDao->getLastId();
    foreach ($product_list as $key => $value) {
        $cantidad = $value['cantidad'];
        $producto_id = $value['producto_id'];
        $producto_r = mysqli_fetch_assoc($productoDao->selectById($producto_id));
        $producto_precio = $producto_r['producto_precio'];
        $pedido_productoDaoDao->insert($cantidad, $producto_precio, $pedido_id, $producto_id);
    }
    echo json_encode(true);
} else {
    echo json_encode(false);
}
