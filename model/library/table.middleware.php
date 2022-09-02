<?php
// include('./model/dao/Mysql.php');
include('./model/dao/Lottery_tableDao.php');
include('./model/dao/GiftDao.php');
$lottery_tableDao = new Lottery_tableDao();
$giftDao = new GiftDao();
$lottery_table_rs = $lottery_tableDao->selectById($lottery_table_id);
$gift_rs = $giftDao->selectByLottery_table_id($lottery_table_id);
if (mysqli_num_rows($lottery_table_rs) <= 0 or mysqli_num_rows($gift_rs) <= 0) {
    header('location: ./404');
}
$lottery_table_r = mysqli_fetch_assoc($lottery_table_rs);
$gift_array = getGiftArray($lottery_table_r, $gift_rs);
if ($lottery_table_r['lottery_table_init'] == 0 or $lottery_table_r['lottery_table_init'] == false) {
    $gift_array = generatePositions($lottery_table_r, $gift_array);
    updateDatabase($lottery_table_r, $gift_array, $lottery_tableDao, $giftDao);
}
// functions
function getGiftArray($lottery_table_r, $gift_rs)
{
    $max_gifts = ((int) (($lottery_table_r['lottery_table_rows'] * $lottery_table_r['lottery_table_columns']) * 0.9));
    // $max_gifts = 0;
    $gift_array = array();
    $max_gifts_count = 0;
    for ($gift_index = 0; ($gift_index < mysqli_num_rows($gift_rs) and $max_gifts_count < $max_gifts); $gift_index++) {
        $max_gifts_count++;
        mysqli_data_seek($gift_rs, $gift_index);
        $gift_array[] = mysqli_fetch_assoc($gift_rs);
    }
    return $gift_array;
}
function generatePositions($lottery_table_r, $gift_array)
{
    for ($gift_index = 0; $gift_index < count($gift_array); $gift_index++) {
        $pos_y = 0;
        $pos_x = 0;
        do {
            $exist = false;
            $pos_y = random_int(0, $lottery_table_r['lottery_table_rows'] - 1);
            $pos_x = random_int(0, $lottery_table_r['lottery_table_columns'] - 1);
            if ($gift_index > 0) {
                for ($gift_index2 = 0; $gift_index2 < count($gift_array); $gift_index2++) {
                    if (
                        $gift_array[$gift_index2]['gift_row'] == $pos_y and
                        $gift_array[$gift_index2]['gift_column'] == $pos_x and
                        $gift_index != $gift_index2
                    ) {
                        $exist = true;
                        $gift_index2 = count($gift_array);
                    }
                }
            }
        } while ($exist == true);
        $gift_array[$gift_index]['gift_row'] = $pos_y;
        $gift_array[$gift_index]['gift_column'] = $pos_x;
        // echo "match: " . $gift_array[$gift_index]['gift_row'] . " x " . $gift_array[$gift_index]['gift_column'] . "<br>";
    }
    return $gift_array;
}
function updateDatabase($lottery_table_r, $gift_array, $lottery_tableDao, $giftDao)
{
    // update "lottery_table"
    extract($lottery_table_r);
    $lottery_tableDao->updateInit(1, $lottery_table_id);

    // update "gift"
    foreach ($gift_array as $gift_index => $gift) {
        extract($gift);
        $giftDao->updatePosition($gift_row, $gift_column, $gift_id);
    }
}
function getLetter($number)
{
    $letters = [
        'A', 'B', 'C', 'D', 'E',
        'F', 'G', 'H', 'I', 'J',
        'K', 'L', 'M', 'N', 'O',
        'P', 'Q', 'R', 'S', 'T',
        'U', 'V', 'W', 'X', 'Y',
        'Z'
    ];
    return $letters[$number];
}
?>
<script>
    const $lottery_table_r = JSON.parse('<?= json_encode($lottery_table_r) ?>');
    const $gift_array = JSON.parse('<?= json_encode($gift_array) ?>');
</script>
<style>
    * {
        --table-num-rows: <?= json_encode($lottery_table_r['lottery_table_rows'] + 2) ?>;
    }
</style>