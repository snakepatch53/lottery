<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include './../../dao/Mysql.php';
include './../../dao/GiftDao.php';
$giftDao = new GiftDao();
if (isset(
    $_POST['gift_name'],
    $_POST['gift_descr'],
    $_POST['lottery_table_id']
)) {
    $gift_name = $_POST['gift_name'];
    $gift_descr = $_POST['gift_descr'];
    $lottery_table_id = $_POST['lottery_table_id'];

    $giftDao->insert(
        $gift_name,
        $gift_descr,
        $lottery_table_id
    );

    if (isset($_FILES['gift_img'])) {
        $gift_img = $_FILES['gift_img'];
        if ($gift_img['tmp_name'] != "" or $gift_img['tmp_name'] != null) {
            if (!file_exists('../../../view/img/gift_img')) {
                mkdir("../../../view/img/gift_img", 0700);
            }
            $gift_id = $giftDao->getLastId();
            $desde = $gift_img['tmp_name'];
            $hasta = "../../../view/img/gift_img/" . $gift_id . ".png";
            copy($desde, $hasta);
            $url = $gift_id . ".png";
            $giftDao->updateImg($url, $gift_id);
        }
    }

    echo json_encode(true);
} else {
    echo json_encode(false);
}
