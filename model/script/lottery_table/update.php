<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include './../../dao/Mysql.php';
include './../../dao/Lottery_tableDao.php';
$lottery_tableDao = new Lottery_tableDao();
if (isset(
    $_POST['lottery_table_name'],
    $_POST['lottery_table_date'],
    $_POST['user_id'],
    $_POST['lottery_table_id']
)) {
    $lottery_table_name = $_POST['lottery_table_name'];
    $lottery_table_date = $_POST['lottery_table_date'];
    $user_id = $_POST['user_id'];
    $lottery_table_id = $_POST['lottery_table_id'];
    $lottery_tableDao->update(
        $lottery_table_name,
        $lottery_table_date,
        $user_id,
        $lottery_table_id
    );

    echo json_encode(true);
} else {
    echo json_encode(false);
}
