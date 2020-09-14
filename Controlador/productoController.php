<?php
require_once ('../Modelo/productoModelo.php');
class productoController{
    private $producto;
    public function __construct()
    {
        $this->producto=new Producto();
        $this->acciones();
    }
    public function insertar()
    {echo 'olll';
        if (isset($_POST['nombre'])&&isset($_POST['precio'])&&isset($_POST['tipo'])&&isset($_POST['proveedor'])&&isset($_POST['cantidad'])) {
            $nombre=$_POST['nombre'];
            $precio=$_POST['precio'];
            $tipo=$_POST['tipo'];
            $proveedor=$_POST['proveedor'];
            $cantidad=$_POST['cantidad'];
            $this->producto->insertar($nombre,$precio,$tipo,$proveedor,$cantidad);
        }
        $_SESSION['message']= "Dato Guardado  Satisfactoriamente";
        $_SESSION['message_type']= 'success';
       define ('PAGINA_INICIO','../Vista/producto.php');
      header ('location:'.PAGINA_INICIO);
    }
    public function eliminar()
    {
       if (isset($_GET['eliminar'])) {
           $id=$_GET['eliminar'];
           $this->producto->eliminar($id);
       }
       $_SESSION['message']= "Dato Eliminaado  Satisfactoriamente";
       $_SESSION['message_type']= 'success';
      define ('PAGINA_INICIO','../Vista/producto.php');
     header ('location:'.PAGINA_INICIO);
    }
    public function editar()
    {
        
        if (isset($_POST['id'])&&isset($_POST['nombre'])&&isset($_POST['precio'])&&isset($_POST['tipo'])&&isset($_POST['proveedor'])&&isset($_POST['cantidad'])) {
            $id=$_POST['id'];
            $nombre=$_POST['nombre'];
            $precio=$_POST['precio'];
            $tipo=$_POST['tipo'];
            $proveedor=$_POST['proveedor'];
            $cantidad=$_POST['cantidad'];
            $this->producto->editar($id,$nombre,$precio,$tipo,$proveedor,$cantidad);
            echo 'dsbjl zcx,m';
            
        }
        $_SESSION['message']= "Dato Modificado  Satisfactoriamente";
        $_SESSION['message_type']= 'success';
       //define ('PAGINA_INICIO','../Vista/producto.php');
     //header ('location:'.PAGINA_INICIO);
    }

    public function acciones()
    {
        if (isset($_POST['insertar'])) {
            $this->insertar();
        }
        elseif (isset($_GET['eliminar'])) {
            $this->eliminar();
        }
        elseif (isset($_POST['editar'])) {
            $this->editar();
            
        }
    }
}
new productoController();
?>