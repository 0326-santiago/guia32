<?php
require_once ('../Modelo/rolModelo.php');
class rolController
{
    private $roles;
    public function __construct()
    {
        $this->roles= new Roles();
        $this->acciones();
    }
    public function insertar($rol)
    {
        if (isset($_POST['rol'])) {
            $rol=$_POST['rol'];
            $this->roles->insertar($rol);
        }
    }
    public function eliminar()
    {
        if (isset($_GET['eliminar'])) { 
        $id=$_GET['eliminar'];
        $this->producto->eliminar($id);
        }
        $_SESSION['message']= "Dato Eliminado Satisfactoriamente";
        $_SESSION['message_type']= 'success';
        define('PAGINA_INICIO','../vista/rol.php');
        header('location: ' . PAGINA_INICIO);
    }
    public function editar(){
        
        
        if(isset($_POST['id'])isset($_POST['rol'])&&){
            $id=$_POST['id'];
            $rol=$_POST['rol'];
            $this->roles->editar($id,$rol);
        }
        $_SESSION['message']= "Dato Modificado Satisfactoriamente";
        $_SESSION['message_type']= 'success';
        define('PAGINA_INICIO','../vista/rol.php');
        header('location: ' . PAGINA_INICIO);
        
        
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
new rolController();
?>