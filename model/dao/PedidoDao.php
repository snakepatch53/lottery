<?php
class PedidoDao
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
        return $this->conn->query("SELECT * FROM pedido INNER JOIN usuario ON usuario.usuario_id = pedido.usuario_id");
    }
    public function selectById($pedido_id)
    {
        return $this->conn->query("SELECT * FROM pedido WHERE pedido_id = $pedido_id");
    }
    public function insert(
        $pedido_fecha,
        $usuario_id
    ) {
        return $this->conn->query("
            INSERT INTO pedido SET 
                pedido_fecha='$pedido_fecha',
                usuario_id=$usuario_id 
        ");
    }
    public function update(
        $pedido_fecha,
        $usuario_id,
        $pedido_id
    ) {
        return $this->conn->query("
            UPDATE pedido SET 
                pedido_fecha='$pedido_fecha', 
                usuario_id=$usuario_id 
            WHERE pedido_id = $pedido_id
        ");
    }
    public function delete($pedido_id)
    {
        return $this->conn->query("DELETE FROM pedido WHERE pedido_id = $pedido_id ");
    }
}
