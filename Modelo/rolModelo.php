<?php
require_once ('Conexion.php');
class Roles{
    private $conexion;
    public function __construct()
    {
        $this->conexion= new Conexion();
    }
    public function insertar($roles)
    {
       $sql="INSERT INTO `roles`( `rol_nombre`) VALUES ('$roles ')";
       $this->conexion->consultaActualizar($sql); 
    echo $sql;
    }
    public function listar()
    {
        $sql="SELECT * FROM `roles`";
        $tabla=$this->conexion->consultaTabla($sql);
        return $tabla;
    }
    public function consultar($id)
    {
        $sql="SELECT * FROM `roles` WHERE `id_rol`=$id";
        $fila=$this->conexion->consultaFila($sql);
        return $fila;
    }
    public function eliminar($id)
    {
        $sql="DELETE FROM `roles` WHERE `id_rol`=$id";
        $this->conexion->consultaActualizar($sql);
    }
    public function editar($id,$roles)
    {
        $sql="UPDATE `roles` SET `rol_nombre`='$roles' WHERE `id_rol`=$id";
        $this->conexion->consultaActualizar($sql);
    }
    
    }

?>