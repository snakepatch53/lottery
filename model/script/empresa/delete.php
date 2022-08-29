           
            

<?php

include './../../dao/Mysql.php';
include './../../dao/EmpresaDao.php';
$_entity = new EmpresaDao();
if(isset($_POST['id_empresa'])){
$id_empresa = $_POST['id_empresa'];
$_entity->delete($id_empresa);

echo json_encode(["Success"]);
} else {
echo json_encode([null]);
}
?>
            
