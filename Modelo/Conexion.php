<?php
session_start();
class Conexion{
    
    private $conexion;
    public function __construct()
    {
      return  $this->conexion= new mysqli('localhost','root','','db_proyecto');
    }
    #consultar Actualizar
    public function consultaActualizar($sql)
    {
        $this->conexion->query($sql);
    }
    #consulta Tabla
    public function consultaTabla($sql)
    {
        $tabla=$this->conexion->query($sql)->fetch_all(MYSQLI_ASSOC);
        return $tabla;
    }
    #fila
    public function consultaFila($sql)
    {
        $fila=$this->conexion->query($sql);
        return $fila->fetch_assoc();
    }
}
?> 