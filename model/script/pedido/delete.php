         
            

<?php
/*
_____________________________________________________________________________________________
- CREA UN ARCHIVO CON EL NOMBRE Y EXTENSION INDICADA.
- RUTA: proyect/model/script/pedido/delete.php
*/
include './../../dao/Mysql.php';
include './../../dao/PedidoDao.php';
$_entity = new PedidoDao();
if(isset($_POST['pedido_id'])){
$pedido_id = $_POST['pedido_id'];
$_entity->delete($pedido_id);

echo json_encode(["Success"]);
} else {
echo json_encode([null]);
}
?>
         