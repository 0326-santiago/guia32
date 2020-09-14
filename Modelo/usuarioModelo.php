
<?php
require_once 'Conexion.php';
class Usuario{
    private $conexion;
    public function __construct() {
        $this->conexion= new Conexion();
    }

    public function consultaRol()
    {
       $sql="SELECT * FROM `roles`";
       return $this->conexion->consultaTabla($sql);
    }
    
    #insertar
    public function insertar($rol,$nombre,$correo,$contraseña)
    {
       $sql="INSERT INTO `usuarios`(`rol`, `nombre`, `correo`, `contraseña`) VALUES ('$rol','$nombre','$correo','$contraseña')";
        $this->conexion->consultaActualizar($sql);
        echo $sql;

    }
    #listar
    public function listar()
    {
        $sql="SELECT * FROM `usuarios`INNER JOIN roles ON usuarios.rol=roles.id_rol ";    
        $tabla= $this->conexion->consultaTabla($sql);
       return $tabla;
        
    }
    #consultar
    public function consultar($id)
    {
        $sql="SELECT * FROM `usuarios`INNER JOIN roles ON usuarios.rol=roles.id_rol WHERE `id_usuario`=$id";
         return $this->conexion->consultaFila($sql);
        
    }
    public function eliminar($id)
    {
        $sql="DELETE FROM `usuarios` WHERE `id_usuario`=$id";
        $this->conexion->consultaActualizar($sql);
    }
    public function editar($id,$rol,$nombre,$correo,$contraseña)
    {
        $sql="UPDATE `usuarios` SET `rol`='$rol',`nombre`='$nombre',`correo`='$correo',`contraseña`='$contraseña' WHERE `id_usuario`=$id";
        $this->conexion->consultaActualizar($sql);
        echo $sql;
    }
}

?>
