<?php
require_once ('../Modelo/tipoModelo.php');
class tipoController{
    private $tipo;
    public function __construct()
    {
        $this->tipo= new Tipo();
        $this->acciones();
    }
    public function insertar()
    {
       if (isset($_POST['descripcion'])) {
           $descripcion=$_POST['descripcion'];
           $this->tipo->insertar($descripcion);
       }
       $_SESSION['message']= "Dato Guardado  Satisfactoriamente";
        $_SESSION['message_type']= 'success';
       define ('PAGINA_INICIO','../Vista/tipoProducto.php');
       header ('location:'.PAGINA_INICIO);
    }
    
       
   public function eliminar()
   {
    if (isset($_GET['eliminar'])) {
        $id=$_GET['eliminar'];
        $this->tipo->eliminar($id);
   }
   $_SESSION['message']= "Dato Eliminado  Satisfactoriamente";
   $_SESSION['message_type']= 'success';
  define ('PAGINA_INICIO','../Vista/tipoProducto.php');
  header ('location:'.PAGINA_INICIO);
    }

    public function editar()
    {
        if (isset($_POST['id'])&&isset($_POST['descripcion'])) {
            $id=$_POST['id'];
            $descripcion=$_POST['descripcion'];
            $this->tipo->editar($id,$descripcion);

        }
        $_SESSION['message']= "Dato Modificado  Satisfactoriamente";
        $_SESSION['message_type']= 'success';
       define ('PAGINA_INICIO','../Vista/tipoProducto.php');
       header ('location:'.PAGINA_INICIO);
    }
    public function acciones()
    {
        if (isset($_POST['insertar'])) {
          $this->insertar();
        }
        elseif (isset($_GET['eliminar'])) {
            $this->eliminar();
            echo 'yaaaa';
        }
        elseif (isset($_POST['editar'])) {
            $this->editar();
          }
    
    }
}
new tipoController();
?>