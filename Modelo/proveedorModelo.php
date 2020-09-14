
<?php
require_once 'Conexion.php';
class Proveedor{
    private $conexion;
    public function __construct() {
        $this->conexion= new Conexion();
    }

    
    
    #insx
    public function insertar($rut,$nombre,$celular,$correo,$direccion)
    {
       $sql="INSERT INTO `proveedor`(`rut`, `nombre`, `celular`, `correo`, `direccion`) VALUES ('$rut','$nombre','$celular','$correo','$direccion')";
        $this->conexion->consultaActualizar($sql);
        echo $sql;

    }
    #listar
    public function listar()
    {
        $sql="SELECT * FROM `proveedor` ";    
        $tabla= $this->conexion->consultaTabla($sql);
       return $tabla;
        
    }
    #consultar
    public function consultar($id)
    {
        $sql="SELECT * FROM `proveedor` WHERE `id_proveedor`=$id";
         return $this->conexion->consultaFila($sql);
        
    }
    public function eliminar($id)
    {
        $sql="DELETE FROM `proveedor` WHERE `id_proveedor`=$id";
        $this->conexion->consultaActualizar($sql);
    }
    public function editar($id,$rut,$nombre,$celular,$correo,$direccion)
    {
        $sql="UPDATE `proveedor` SET `rut`='$rut',`nombre`='$nombre',`celular`='$celular',`correo`='$correo',`direccion`='$direccion' WHERE `id_proveedor`=$id";
        $this->conexion->consultaActualizar($sql);
        echo $sql;
    }
}

?>
