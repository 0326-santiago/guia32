<?php
require_once ('../Modelo/clienteModelo.php');
class clienteController{
    private $cliente;
    public function __construct()
    {
        $this->cliente= new Cliente();
        $this->acciones();

    }
    public function insertar()
    {
        if (isset($_POST['documento'])&&isset($_POST['nombre'])&&isset($_POST['celular'])&&isset($_POST['correo'])&&isset($_POST['direccion'])&&isset($_POST['ciudad'])) {
            $documento=$_POST['documento'];
            $nombre=$_POST['nombre'];
            $celular=$_POST['celular'];
            $correo=$_POST['correo'];
            $direccion=$_POST['direccion'];
            $ciudad=$_POST['ciudad'];
            echo'maaaa ayuda';
            $this->cliente->insertar($documento,$nombre,$celular,$correo,$direccion,$ciudad);
            

        }
        $_SESSION['message']= "Dato Guardado  Satisfactoriamente";
        $_SESSION['message_type']= 'success';

       define('PAGINA_INICIO','../Vista/cliente.php');
        header('location:'.PAGINA_INICIO);
    }
    public function eliminar()
    {
        
    if (isset($_GET['eliminar'])) {
        $id=$_GET['eliminar'];
        $this->cliente->eliminar($id);
       
        }
        $_SESSION['message']= "Dato Eliminado Satisfactoriamente";
        $_SESSION['message_type']= 'success';

        define('PAGINA_INICIO','../Vista/cliente.php');
        header('location:'.PAGINA_INICIO);
    }
    public function editar()
    {
        echo 'Mmaaa';
     if (isset($_POST['idC'])&&isset($_POST['documento'])&&isset($_POST['nombre'])&&isset($_POST['celular'])&&isset($_POST['correo'])&&isset($_POST['direccion'])&&isset($_POST['ciudad'])) {
         $id=$_POST['idC'];
         $documento=$_POST['documento'];
         $nombre=$_POST['nombre'];
         $celular=$_POST['celular'];
         $correo=$_POST['correo'];
         $direccion=$_POST['direccion'];
         $ciudad=$_POST['ciudad'];
         $this->cliente->editar($id,$documento,$nombre,$celular,$correo,$direccion,$ciudad);
     }   
     $_SESSION['message']= "Dato Modificado Satisfactoriamente";
        $_SESSION['message_type']= 'success';

       define('PAGINA_INICIO','../Vista/cliente.php');
     header('location:'.PAGINA_INICIO);
    }
  
    public function acciones()
    {
        if (isset($_POST['insertar'])){
          $this->insertar();
        }
        else if (isset($_GET['eliminar'])) {
            $this->eliminar();
        }
        if (isset($_POST['editar'])) {
           $this->editar();
        }
        
    }
}
new  clienteController();
?>