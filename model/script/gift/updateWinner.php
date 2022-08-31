<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include './../../dao/Mysql.php';
include './../../dao/GiftDao.php';
$giftDao = new GiftDao();
if (isset(
    $_POST['gift_winner'],
    $_POST['gift_id']
)) {
    $gift_winner = $_POST['gift_winner'];
    $gift_id = $_POST['gift_id'];
    $giftDao->updateWinner(
        $gift_winner,
        $gift_id
    );

    echo json_encode(true);
} else {
    echo json_encode(false);
}
