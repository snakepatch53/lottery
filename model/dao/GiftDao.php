<?php
class GiftDao
{
    private $conn;
    public function __construct()
    {
        $this->conn = new Mysql();
    }
    public function getLastId()
    {
        return $this->conn->getLastId();
    }
    public function select()
    {
        return $this->conn->query("SELECT * FROM gift");
    }
    public function selectByLottery_table_id($lottery_table_id)
    {
        return $this->conn->query("
            SELECT * FROM gift
            WHERE lottery_table_id = $lottery_table_id
            ORDER BY RAND()
        ");
    }

    public function insert(
        $gift_name,
        $gift_descr,
        $lottery_table_id
    ) {
        return $this->conn->query("
            INSERT INTO gift SET 
                gift_name='$gift_name', 
                gift_descr='$gift_descr',
                lottery_table_id=$lottery_table_id
        ");
    }
    public function updatePosition(
        $gift_row,
        $gift_column,
        $gift_id
    ) {
        return $this->conn->query("
            UPDATE gift SET 
                gift_row=$gift_row,
                gift_column=$gift_column
            WHERE gift_id=$gift_id
        ");
    }
    function updateImg($gift_img, $gift_id)
    {
        return $this->conn->query("
            UPDATE gift SET gift_img='$gift_img'
            WHERE gift_id = $gift_id
        ");
    }
    function updateWinner($gift_winner, $gift_id)
    {
        return $this->conn->query("
            UPDATE gift SET gift_winner='$gift_winner'
            WHERE gift_id = $gift_id
        ");
    }
    public function delete($gift_id)
    {
        return $this->conn->query("DELETE FROM gift WHERE gift_id = $gift_id ");
    }
}
