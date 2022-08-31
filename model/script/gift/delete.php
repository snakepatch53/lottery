<?php
include './../../dao/Mysql.php';
include './../../dao/GiftDao.php';
$giftDao = new GiftDao();
if (isset($_POST['gift_id'])) {
    $gift_id = $_POST['gift_id'];
    $giftDao->delete($gift_id);
    echo json_encode(true);
} else {
    echo json_encode(false);
}
