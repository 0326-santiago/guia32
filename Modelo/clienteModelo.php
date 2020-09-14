<?php
require_once ('Conexion.php');
class Cliente 
{
private $conexion;
public function __construct()
{
    $this->conexion=new Conexion();
}    
#insertar
public function insertar($documento,$nombre,$celular,$correo,$direccion,$ciudad)
{
    $sql="INSERT INTO `cliente`(`documentoC`, `nombreC`, `celularC`, `correoC`, `direccionC`, `ciudadC`) VALUES ('$documento','$nombre','$celular','$correo','$direccion','$ciudad')";
    $this->conexion->consultaActualizar($sql);
    echo $sql;
}
#listar
public function listar()
{
    $sql="SELECT * FROM `cliente` ";
    $tabla=$this->conexion->consultaTabla($sql);
    return$tabla;
}
#consultar
public function consultar($id)
{
    $sql="SELECT * FROM `cliente` WHERE `id_cliente`=$id";
    $fila=$this->conexion->consultaFila($sql);
    return $fila;
}
#4liminar
public function eliminar($id)

    {
        $sql="DELETE FROM `cliente` WHERE `id_cliente`=$id";
        $this->conexion->consultaActualizar($sql);
    }
    #editAR
    public function editar($id,$documento,$nombre,$celular,$correo,$direccion,$ciudad)
    {
        $sql="UPDATE `cliente` SET`documentoC`='$documento',`nombreC`='$nombre',`celularC`='$celular',`correoC`='$correo',`direccionC`='$direccion',`ciudadC`='$ciudad' WHERE `id_cliente`=$id";
        $this->conexion->consultaActualizar($sql);
        echo $sql;
        
    }
}


?>