<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include './../../dao/Mysql.php';
include './../../dao/Lottery_tableDao.php';
$lottery_tableDao = new Lottery_tableDao();
if (isset($_POST['lottery_table_id'])) {
    $lottery_table_id = $_POST['lottery_table_id'];
    $lottery_table_rs = $lottery_tableDao->selectById($lottery_table_id);
    $array = array();
    $lottery_table_r = mysqli_fetch_assoc($lottery_table_rs);
    echo json_encode($lottery_table_r);
} else {
    echo json_encode(false);
}
