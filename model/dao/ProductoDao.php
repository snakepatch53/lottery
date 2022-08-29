                            
<?php

class ProductoDao{
private $conn;
public function __construct(){
$this->conn = new Mysql();
}
public function select(){
return $this->conn->query("SELECT * FROM producto");
}
public function selectById($producto_id){
return $this->conn->query("SELECT * FROM producto WHERE producto_id = $producto_id");
}
public function insert($producto_nombre, $producto_precio, $producto_descripcion){
return $this->conn->query("INSERT INTO producto SET producto_nombre='$producto_nombre', producto_precio=$producto_precio, producto_descripcion='$producto_descripcion' ");
}
public function update($producto_nombre, $producto_precio, $producto_descripcion, $producto_id){
return $this->conn->query("UPDATE producto SET producto_nombre='$producto_nombre', producto_precio=$producto_precio, producto_descripcion='$producto_descripcion' WHERE producto_id = $producto_id ");
}
public function delete($producto_id){
return $this->conn->query("DELETE FROM producto WHERE producto_id = $producto_id ");
}

public function selectByAll($producto_nombre, $producto_precio, $producto_descripcion){
return $this->conn->query("SELECT * FROM producto WHERE producto_nombre='$producto_nombre' AND producto_precio=$producto_precio AND producto_descripcion='$producto_descripcion' ");
}
                    
public function updateProducto_img($producto_img, $producto_id){
return $this->conn->query("UPDATE producto SET producto_img='$producto_img' WHERE producto_id = $producto_id ");
}
                        

}
?>
            
                        