<?php

require_once ('Conexion.php');
class Bodega{
    private $conexion;
    public function __construct()
    {
        $this->conexion=new Conexion();
    }
    public function consultaProducto()
    {
        $sql="SELECT * FROM `producto`";
        return $this->conexion->consultaTabla($sql);
    }
    public function insertar($producto,$cantidad)
    {
        $sql="INSERT INTO `bodega`(`producto`, `cantidad`) VALUES ('$producto','$cantidad')";
        $this->conexion->consultaActualizar($sql);
        echo$sql;
    }
    public function listar()
    {
        $sql="SELECT * FROM `bodega`INNER JOIN producto ON bodega.producto=producto.id_producto";
        $tabla=$this->conexion->consultaTabla($sql);
        return $tabla;
    }
    public function consultar($id)
    {
        $sql="SELECT * FROM `bodega`INNER JOIN producto ON bodega.producto=producto.id_producto WHERE`id_bodega`=$id";
        return $this->conexion->consultaTabla($sql);
    }
    public function eliminar($id)
    {
        $sql="DELETE FROM `bodega` WHERE `id_bodega`=$id";
        $this->conexion->consultaActualizar($sql);
    }
    public function editar($id,$producto,$cantidad)
    {
        $sql="UPDATE `bodega` SET `producto`='$producto',`cantidad`='$cantidad' WHERE `id_bodega`=$id";
        $this->conexion->consultaActualizar($sql);
        echo $sql;
    }
    
}
?>