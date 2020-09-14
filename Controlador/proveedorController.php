<?php
require_once ('../Modelo/proveedorModelo.php');
class proveedorController{
    private $proveedor;
    public function __construct()
    {
        $this->proveedor=new Proveedor();
        $this->acciones();
    }
    public function insertar()
    {echo 'hola';

        if (isset($_POST['rut'])&&isset($_POST['nombre'])&&isset($_POST['celular'])&&isset($_POST['correo'])&&isset($_POST['direccion'])) {
            $rut=$_POST['rut'];
            $nombre=$_POST['nombre'];
            $celular=$_POST['celular'];
            $correo=$_POST['correo'];
            $direccion=$_POST['direccion'];

            $this->proveedor->insertar($rut,$nombre,$celular,$correo,$direccion);
        }
        $_SESSION['message']="Dato Guardado Satisfactoriamente";
        $_SESSION['message_type']='success';
        define ('PAGINA_INICIO','../Vista/proveedor.php');
        header('location:'.PAGINA_INICIO);

    }
    public function eliminar()
    {
        if (isset($_GET['eliminar'])) {
            $id=$_GET['eliminar'];
            $this->proveedor->eliminar($id);
        }
        $_SESSION['message']="Dato Eliminado Satisfactoriamente";
        $_SESSION['message_type']='success';
        define ('PAGINA_INICIO','../Vista/proveedor.php');
        header('location:'.PAGINA_INICIO);
    }
    public function editar()
    {
        if (isset($_POST['id'])&&isset($_POST['rut'])&&isset($_POST['nombre'])&&isset($_POST['celular'])&&isset($_POST['correo'])&&isset($_POST['direccion'])) {
            $id=$_POST['id'];
            $rut=$_POST['rut'];
            $nombre=$_POST['nombre'];
            $celular=$_POST['celular'];
            $correo=$_POST['correo'];
            $direccion=$_POST['direccion'];

            $this->proveedor->editar($id,$rut,$nombre,$celular,$correo,$direccion);
        }
        $_SESSION['message']="Dato Modificado Satisfactoriamente";
        $_SESSION['message_type']='success';
        define ('PAGINA_INICIO','../Vista/proveedor.php');
        header('location:'.PAGINA_INICIO);
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
new proveedorController();
?>