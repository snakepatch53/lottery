                            
<?php

class Pedido_productoDao
{
    private $conn;
    public function __construct()
    {
        $this->conn = new Mysql();
    }
    public function select()
    {
        return $this->conn->query("
            SELECT * FROM pedido_producto
            INNER JOIN pedido ON pedido.pedido_id = pedido_producto.pedido_id
            INNER JOIN producto ON producto.producto_id = pedido_producto.producto_id
        ");
    }
    public function selectById($pedido_producto_id)
    {
        return $this->conn->query("SELECT * FROM pedido_producto WHERE pedido_producto_id = $pedido_producto_id");
    }
    public function insert($pedido_producto_cantidad, $pedido_producto_precio, $pedido_id, $producto_id)
    {
        return $this->conn->query("INSERT INTO pedido_producto SET pedido_producto_cantidad=$pedido_producto_cantidad, pedido_producto_precio=$pedido_producto_precio, pedido_id=$pedido_id, producto_id=$producto_id ");
    }
    public function update($pedido_producto_cantidad, $pedido_producto_precio, $pedido_id, $producto_id, $pedido_producto_id)
    {
        return $this->conn->query("UPDATE pedido_producto SET pedido_producto_cantidad=$pedido_producto_cantidad, pedido_producto_precio=$pedido_producto_precio, pedido_id=$pedido_id, producto_id=$producto_id WHERE pedido_producto_id = $pedido_producto_id ");
    }
    public function delete($pedido_producto_id)
    {
        return $this->conn->query("DELETE FROM pedido_producto WHERE pedido_producto_id = $pedido_producto_id ");
    }
}
?>
            
                        