<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROSS DRESS FOR LESS</title>
    <link rel="stylesheet" href="../boostrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../boostrap/css/body.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <script src="../boostrap/js/jquery-3.4.1.min.js"></script>
    <script src="../boostrap/js/bootstrap.min.js"></script>

    <script src="../boostrap/js/popper.min.js"></script>

</head>
<?php
require_once ('../Modelo/usuarioModelo.php');
$usuario=new Usuario ();
$lista=$usuario->listar();
$roles=$usuario->consultaRol();
$id="";
$rol="";
$nombre="";
$correo="";
$contraseña="";
if (isset($_GET['editar'])) {
    $id=$_GET['editar'];
    $fila=$usuario->consultar($id);
    $rol=$fila['rol_nombre'];
    $id=$fila['id_usuario'];
    $idR=$fila['rol'];
    $rol=$fila['rol'];
    $nombre=$fila['nombre'];
    $correo=$fila['correo'];
    $contraseña=$fila['contraseña'];
    $fecha=$fila['fecha'];

}
?>

<body style="background-image: url(img/wen2.jpeg);">
<header style="background-color:whitesmoke;" class="header-section">
        <div class="container-fluid" >
            <div class="inner-header">
                <div class="logo">
                    <nav class="main-menu mobile-menu">
                        <ul>
                            
                                <ul class="sub-menu">
                                    
                                </ul>
                            </li>
                        </ul>
                </div>
                <nav class="main-menu mobile-menu">
                    <ul>

                    <li><a href="index2.html">INICIO</a></li>
                        <li><a href="proveedor.php">Proveedores</a></li>
                        <li><a href="tipoProducto.php"> Tipo de Productos</a></li>
                        <li><a href="producto.php">Producto</a></li>
                        <li><a href="bodega.php">Bodega</a></li>
                        <li><a href="cliente.php">Registrar</a></li>
                        <li><a href="ver.php">Comprar</a></li>
                     
                      


                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div  class="card card-body">
            <div class="container">
                <?php if(isset($_SESSION['message'])){ ?>
                <div class="alert alert-warning alert-dismissible fade show">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <?php session_unset(); }?>
            <form action="../Controlador/usuarioController.php" method="post">
           
            <h2>Login</h2>
            <br>
                <div class="row mx-4 my-4">
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$id?>" id="">
                            <label for="">Rol</label>
                            <select name="rol" class="form-control" id="">
                                <?php
                        foreach ($roles as $usuario) {
                            if ($rol==$usuario['rol_nombre']) {
                                ?>
                                <option value="<?=$idR?>" selected><?=$usuario?></option>
                                <?php
                            }else {
                                ?>
                                <option value="<?=$usuario['id_rol']?>"><?=$usuario['rol_nombre']?></option>
                                <?php
                            }
                        }   
                        ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Correo:</label>
                            <input type="email" name="correo" value="<?=$correo?>" class="form-control"
                                placeholder="E-mail" id="">
                        </div>
                        <?php
                    if (isset($_GET['editar'])) {
                        ?>
                        <input type="submit" name="editar" value="Actualizar" class="btn btn-success " id="">

                        <?php
                    }else {
                        ?>
                        <input type="submit" name="insertar" value="Guardar" class="btn btn-success " id="">

                        <?php
                    }
                 ?>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Nombre:</label>
                            <input type="text" name="nombre" value="<?=$nombre?>" class="form-control"
                                placeholder="Nombre" id="">
                        </div>

                        <div class="form-group">
                            <label for="">Contraseña:</label>
                            <input type="password" name="contraseña" value="<?=$contraseña?>" class="form-control"
                                placeholder="Contraseña" id="">
                        </div>
                        <input type="hidden" name="fecha" value="<?=$fecha?>" id="">

                    </div>
                </div>
            </form>

            <br>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>id_usuario</th>
                        <th>rol</th>
                        <th>nombre</th>
                        <th>E-mail</th>
                        <th>Contraseña</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($lista as $usuario) {
                        ?>
                    <tr>
                        <td><?=$usuario['id_usuario']?></td>
                        <td><?=$usuario['rol_nombre']?></td>
                        <td><?=$usuario['nombre']?></td>
                        <td><?=$usuario['correo']?></td>
                        <td><?=$usuario['contraseña']?></td>
                        <td><?=$usuario['fecha']?></td>
                        <td>
                            <a href="../Controlador/usuarioController.php?eliminar=<?=$usuario['id_usuario']?>"
                                class="btn btn-danger btn-block">Eliminar</a>
                        </td>
                        <td>
                            <a href="usuarios.php?editar=<?=$usuario['id_usuario']?>"
                                class="btn btn-warning btn-block">Editar</a>

                        </td>
                    </tr>
                    <?php
                    }
               ?>
                </tbody>
            </table>
        </div>
    </div>

<br>


    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>