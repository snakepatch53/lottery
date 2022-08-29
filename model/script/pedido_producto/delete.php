     

<?php
/*
_____________________________________________________________________________________________
- CREA UN ARCHIVO CON EL NOMBRE Y EXTENSION INDICADA.
- RUTA: proyect/model/script/pedido_producto/delete.php
*/
include './../../dao/Mysql.php';
include './../../dao/Pedido_productoDao.php';
$_entity = new Pedido_productoDao();
if(isset($_POST['pedido_producto_id'])){
$pedido_producto_id = $_POST['pedido_producto_id'];
$_entity->delete($pedido_producto_id);

echo json_encode(["Success"]);
} else {
echo json_encode([null]);
}
?>
        