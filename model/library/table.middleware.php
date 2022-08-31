<?php
include('./model/dao/Mysql.php');
include('./model/dao/Lottery_tableDao.php');
include('./model/dao/GiftDao.php');
$lottery_tableDao = new Lottery_tableDao();
$giftDao = new GiftDao();
$lottery_table_rs = $lottery_tableDao->selectById($lottery_table_id);
if (mysqli_num_rows($lottery_table_rs) <= 0) {
    header('location: ./404');
}
$lottery_table_r = mysqli_fetch_assoc($lottery_table_rs);
$lottery_table_r['lottery_table_rows'] = 7;
$lottery_table_r['lottery_table_columns'] = 7;

$gift_rs = $giftDao->selectByLottery_table_id($lottery_table_id);
$gift_array = array();
while ($gift_r = mysqli_fetch_assoc($gift_rs)) {
    $gift_array[] = $gift_r;
}
$letters = [
    'A', 'B', 'C', 'D', 'E',
    'F', 'G', 'H', 'I', 'J',
    'K', 'L', 'M', 'N', 'O',
    'P', 'Q', 'R', 'S', 'T',
    'U', 'V', 'W', 'X', 'Y',
    'Z'
];
?>
<script>
    const $lottery_table_r = JSON.parse('<?= json_encode($lottery_table_r) ?>');
    const $gift_array = JSON.parse('<?= json_encode($gift_array) ?>');
</script>