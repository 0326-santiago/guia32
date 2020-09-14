<?php
require_once ('../Modelo/usuarioModelo.php');
class usuarioController{
    private $usuario;
    public function __construct()
    {
        $this->usuario=new Usuario();
        $this->acciones();
    }
    public function insertar()
    {echo 'hola';

        if (isset($_POST['rol'])&&isset($_POST['nombre'])&&isset($_POST['correo'])&&isset($_POST['contraseña'])) {
            $rol=$_POST['rol'];
            $nombre=$_POST['nombre'];
            $correo=$_POST['correo'];
            $contraseña=$_POST['contraseña'];
            $this->usuario->insertar($rol,$nombre,$correo,$contraseña);
        }
        $_SESSION['message']="Dato Guardado Satisfactoriamente";
        $_SESSION['message_type']='success';
        define ('PAGINA_INICIO','../Vista/usuarios.php');
        header('location:'.PAGINA_INICIO);

    }
    public function eliminar()
    {
        if (isset($_GET['eliminar'])) {
            $id=$_GET['eliminar'];
            $this->usuario->eliminar($id);
        }
        $_SESSION['message']="Dato Eliminado Satisfactoriamente";
        $_SESSION['message_type']='success';
        define ('PAGINA_INICIO','../Vista/usuarios.php');
        header('location:'.PAGINA_INICIO);
    }
    public function editar()
    {
        if (isset($_POST['id'])&&isset($_POST['rol'])&&isset($_POST['nombre'])&&isset($_POST['correo'])&&isset($_POST['contraseña'])) {
            $id=$_POST['id'];
            $rol=$_POST['rol'];
            $nombre=$_POST['nombre'];
            $correo=$_POST['correo'];
            $contraseña=$_POST['contraseña'];
            $this->usuario->editar($id,$rol,$nombre,$correo,$contraseña);
        }  
        $_SESSION['message']="Dato Modificado Satisfactoriamente";
        $_SESSION['message_type']='success';
        define ('PAGINA_INICIO','../Vista/usuarios.php');
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
new usuarioController();
?>