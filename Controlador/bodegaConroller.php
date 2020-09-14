<?php
require_once ('../Modelo/bodegaModelo.php');
class BodegaConroller{
    private $bodega;
    public function __construct()
    {
        $this->bodega= new Bodega();
        $this->acciones();
    }
    public function insertar()
    {
        if (isset($_POST['producto'])&&isset($_POST['cantidad'])) {
           $producto=$_POST['producto'];
           $cantidad=$_POST['cantidad'];
           $this->bodega->insertar($producto,$cantidad);
        }
        $_SESSION['message']= "Dato Guardado  Satisfactoriamente";
        $_SESSION['message_type']= 'success';
       define ('PAGINA_INICIO','../Vista/bodega.php');
     header ('location:'.PAGINA_INICIO);
    }
    public function eliminar()
    {
        if (isset($_GET['eliminar'])) {
            $id=$_GET['eliminar'];
            $this->bodega->eliminar($id);
        }
         $_SESSION['message']= "Dato Eliminado  Satisfactoriamente";
         $_SESSION['message_type']= 'success';
         define ('PAGINA_INICIO','../Vista/bodega.php');
         header ('location:'.PAGINA_INICIO);
    }
    public function editar()
    {
        if (isset($_POST['id'])&&isset($_POST['producto'])&&isset($_POST['cantidad'])) {
            $id=$_POST['id'];
            $producto=$_POST['producto'];
            $cantidad=$_POST['cantidad'];
            $this->bodega->editar($id,$producto,$cantidad);
         }
         $_SESSION['message']= "Dato Modificado  Satisfactoriamente";
         $_SESSION['message_type']= 'success';
         //define ('PAGINA_INICIO','../Vista/bodega.php');
         //header ('location:'.PAGINA_INICIO);
    }

    public function acciones()
    {
       if (isset($_POST['insertar'])) {
           $this->insertar();
       }
       if (isset($_GET['eliminar'])) {
           $this->eliminar();
       }
       if (isset($_POST['editar'])) {
           $this->editar();
       }
    }
}
new BodegaConroller();
?>