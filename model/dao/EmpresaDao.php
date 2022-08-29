                            
<?php

class EmpresaDao{
private $conn;
public function __construct(){
$this->conn = new Mysql();
}
public function select(){
return $this->conn->query("SELECT * FROM empresa");
}
public function selectById($empresa_id){
return $this->conn->query("SELECT * FROM empresa WHERE empresa_id = $empresa_id");
}
public function insert($empresa_nombre, $empresa_ubicacion, $empresa_horario_atencion, $empresa_telefono, $empresa_email){
return $this->conn->query("INSERT INTO empresa SET empresa_nombre='$empresa_nombre', empresa_ubicacion='$empresa_ubicacion', empresa_horario_atencion='$empresa_horario_atencion', empresa_telefono='$empresa_telefono', empresa_email='$empresa_email' ");
}
public function update($empresa_nombre, $empresa_ubicacion, $empresa_horario_atencion, $empresa_telefono, $empresa_email, $empresa_id){
return $this->conn->query("UPDATE empresa SET empresa_nombre='$empresa_nombre', empresa_ubicacion='$empresa_ubicacion', empresa_horario_atencion='$empresa_horario_atencion', empresa_telefono='$empresa_telefono', empresa_email='$empresa_email' WHERE empresa_id = $empresa_id ");
}
public function delete($empresa_id){
return $this->conn->query("DELETE FROM empresa WHERE empresa_id = $empresa_id ");
}


}
?>
            
                        