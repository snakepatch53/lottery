<?php
class Lottery_tableDao
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
        return $this->conn->query("SELECT * FROM lottery_table");
    }
    public function selectById($lottery_table_id)
    {
        return $this->conn->query("SELECT * FROM lottery_table WHERE lottery_table_id = $lottery_table_id");
    }
    public function selectByUser_id($user_id)
    {
        return $this->conn->query("
            SELECT * FROM lottery_table WHERE user_id = $user_id
        ");
    }
    public function insert(
        $lottery_table_name,
        $lottery_table_date,
        $user_id
    ) {
        date_default_timezone_set('America/Guayaquil');
        $lottery_table_create = date('Y-m-d H:m:i');
        return $this->conn->query("
            INSERT INTO lottery_table SET 
                lottery_table_name='$lottery_table_name', 
                lottery_table_date='$lottery_table_date',
                lottery_table_create='$lottery_table_create',
                user_id = $user_id
        ");
    }
    public function update(
        $lottery_table_name,
        $lottery_table_date,
        $user_id,
        $lottery_table_id
    ) {
        return $this->conn->query("
            UPDATE lottery_table SET 
                lottery_table_name='$lottery_table_name', 
                lottery_table_date='$lottery_table_date',
                user_id = $user_id
            WHERE lottery_table_id = $lottery_table_id 
        ");
    }
    public function delete($lottery_table_id)
    {
        return $this->conn->query("DELETE FROM lottery_table WHERE lottery_table_id = $lottery_table_id ");
    }
}
