<?php
require_once ('Conexion.php');
class Tipo{
    private $conexion;
    public function __construct()
    {
        $this->conexion=new Conexion();
    }
    public function insertar($descripcion)
    {
        $sql="INSERT INTO `tipoproducto`( `descripcion`) VALUES ('$descripcion')";
        $this->conexion->consultaActualizar($sql);
        echo $sql;
    }
    public function listar()
    {
       $sql="SELECT * FROM `tipoproducto`";
       $tabla=$this->conexion->consultaTabla($sql);
       return $tabla;
    }
    public function consultar($id)
    {
        $sql="SELECT * FROM `tipoproducto` WHERE `id_tipo`=$id";
        $fila=$this->conexion->consultaFila($sql);
        return $fila;
    }
    public function eliminar($id)
    {
        $sql="DELETE FROM `tipoproducto` WHERE `id_tipo`=$id";
        $this->conexion->consultaActualizar($sql);
        echo $sql;
    }
    public function editar($id,$descripcion)
    {
        $sql="UPDATE `tipoproducto` SET `descripcion`='$descripcion' WHERE `id_tipo`=$id";
        $this->conexion->consultaActualizar($sql);
        echo $sql;
    }
}
?>