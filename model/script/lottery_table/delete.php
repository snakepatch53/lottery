<?php
include './../../dao/Mysql.php';
include './../../dao/Lottery_tableDao.php';
$lottery_tableDao = new Lottery_tableDao();
if (isset($_POST['lottery_table_id'])) {
    $lottery_table_id = $_POST['lottery_table_id'];
    $lottery_tableDao->delete($lottery_table_id);
    echo json_encode(true);
} else {
    echo json_encode(false);
}
