<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include './../../dao/Mysql.php';
include './../../dao/Lottery_tableDao.php';
$lottery_tableDao = new Lottery_tableDao();
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    date_default_timezone_set('America/Guayaquil');
    $currentDate = date('Y-m-d H:m:i');
    $lottery_table_rs = $lottery_tableDao->selectByUser_id($user_id);
    $array = array();
    while ($lottery_table_r = mysqli_fetch_assoc($lottery_table_rs)) {
        $lottery_table_r['currentdate'] = $currentDate;
        $array[] = $lottery_table_r;
    }
    echo json_encode($array);
} else {
    echo json_encode(false);
}
