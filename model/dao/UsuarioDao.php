<?php
class UsuarioDao
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
        return $this->conn->query("SELECT * FROM usuario");
    }
    public function selectById($usuario_id)
    {
        return $this->conn->query("SELECT * FROM usuario WHERE usuario_id = $usuario_id");
    }
    public function login($usuario_cedula, $usuario_pass)
    {
        return $this->conn->query("
            SELECT * FROM usuario 
            WHERE usuario_cedula = '$usuario_cedula' AND usuario_pass = '$usuario_pass'
        ");
    }
    public function insert(
        $usuario_nombres,
        $usuario_apellidos,
        $usuario_cedula,
        $usuario_telefono,
        $usuario_email,
        $usuario_genero,
        $usuario_nacimiento,
        $usuario_pass,
        $usuario_autorize,
        $usuario_admin
    ) {
        return $this->conn->query("
            INSERT INTO usuario SET 
                usuario_nombres='$usuario_nombres', 
                usuario_apellidos='$usuario_apellidos', 
                usuario_cedula='$usuario_cedula', 
                usuario_telefono='$usuario_telefono', 
                usuario_email='$usuario_email', 
                usuario_genero='$usuario_genero', 
                usuario_nacimiento='$usuario_nacimiento', 
                usuario_pass='$usuario_pass', 
                usuario_autorize=$usuario_autorize, 
                usuario_admin=$usuario_admin
        ");
    }
    public function update(
        $usuario_nombres,
        $usuario_apellidos,
        $usuario_cedula,
        $usuario_telefono,
        $usuario_email,
        $usuario_genero,
        $usuario_nacimiento,
        $usuario_pass,
        $usuario_autorize,
        $usuario_admin,
        $usuario_id
    ) {
        return $this->conn->query("
            UPDATE usuario SET 
                usuario_nombres='$usuario_nombres', 
                usuario_apellidos='$usuario_apellidos', 
                usuario_cedula='$usuario_cedula', 
                usuario_telefono='$usuario_telefono', 
                usuario_email='$usuario_email', 
                usuario_genero='$usuario_genero', 
                usuario_nacimiento='$usuario_nacimiento', 
                usuario_pass='$usuario_pass', 
                usuario_autorize=$usuario_autorize, 
                usuario_admin=$usuario_admin 
            WHERE usuario_id = $usuario_id 
        ");
    }
    public function updateUsuario_foto($usuario_foto, $usuario_id)
    {
        return $this->conn->query("
            UPDATE usuario SET
                usuario_foto='$usuario_foto'
            WHERE usuario_id = $usuario_id
        ");
    }
    public function delete($usuario_id)
    {
        return $this->conn->query("DELETE FROM usuario WHERE usuario_id = $usuario_id ");
    }
}
