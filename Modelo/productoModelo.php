<?php
require_once ('Conexion.php');

class Producto
{
    private $conexion;

    public function __construct()
    {
        $this->conexion=new Conexion();
    }
    public function consultaTipo()
    {
        $sql="SELECT * FROM `tipoproducto` ";
        return $this->conexion->consultaTabla($sql);
    }
    public function consultaProveedor()
    {
        $sql="SELECT * FROM `proveedor` ";
        return $this->conexion->consultaTabla($sql);
    }
    public function insertar($nombre,$precio,$tipo,$proveedor,$cantidad)
    {
       $sql="INSERT INTO `producto`(`nombreP`, `precioP`, `tipoProducto`, `proveedor`, `cantidad`) VALUES ('$nombre','$precio','$tipo','$proveedor','$cantidad')";
       $this->conexion->consultaActualizar($sql);
       echo $sql;
    }
    public function listar()
    {
       $sql="SELECT * FROM `producto` INNER JOIN tipoproducto ON producto.tipoProducto=tipoproducto.id_tipo 
       JOIN proveedor ON producto.proveedor=proveedor.id_proveedor";
       $tabla=$this->conexion->consultaTabla($sql);
       return $tabla;
    }
    public function consultar($id)
    {
        $sql="SELECT * FROM `producto` INNER JOIN tipoproducto ON producto.tipoProducto=tipoproducto.id_tipo 
        JOIN proveedor ON producto.proveedor=proveedor.id_proveedor";
        return $this->conexion->consultaFila($sql);    
    }
    public function eliminar($id)
    {
        $sql="DELETE FROM `producto` WHERE `id_producto`=$id";
        $this->conexion->consultaActualizar($sql);
    }
    public function editar($id,$nombre,$precio,$tipo,$proveedor,$cantidad)
    {
      
        $sql="UPDATE `producto` SET`nombreP`='$nombre',`precioP`='$precio',`tipoProducto`='$tipo',`proveedor`='$proveedor',`cantidad`='$cantidad' WHERE `id_producto`=$id";
       $this->conexion->consultaActualizar($sql);
    
       echo $sql;
    }
}
?>