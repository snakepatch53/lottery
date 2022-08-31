<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include './../../dao/Mysql.php';
include './../../dao/GiftDao.php';
$giftDao = new GiftDao();
$gift_rs = $giftDao->select();
$array = array();
while ($gift_r = mysqli_fetch_assoc($gift_rs)) {
    $array[] = $gift_r;
}
echo json_encode($array);
