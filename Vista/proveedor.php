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
require_once ('../Modelo/proveedorModelo.php');
$proveedor=new Proveedor ();
$lista=$proveedor->listar();

$id="";
$rut="";
$nombre="";
$celular="";
$correo="";
$direccion="";
if (isset($_GET['editar'])) {
    $id=$_GET['editar'];
    $fila=$proveedor->consultar($id);
    $id=$fila['id_proveedor'];
    $rut=$fila['rut'];
    $nombre=$fila['nombre'];
    $celular=$fila['celular'];
    $correo=$fila['correo'];
    $direccion=$fila['direccion'];
   echo $direccion;

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
            <form action="../Controlador/proveedorController.php" method="post">
           
            <h2>Proveedores</h2>
            <br>
                <div class="row mx-4 my-4">
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$id?>" id="">
                            <label for="">Rut</label>
                            <input type="text" name="rut" value="<?=$rut?>" class="form-control"
                                placeholder="Rut" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Celular:</label>
                            <input type="number" name="celular" value="<?=$celular?>" class="form-control"
                                placeholder="Celular" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Direccion:</label>
                            <input type="text" name="direccion" value="<?=$direccion?>" class="form-control"
                                placeholder="Direccion" id="">
                        </div>
                        
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Nombre:</label>
                            <input type="text" name="nombre" value="<?=$nombre?>" class="form-control"
                                placeholder="Nombre" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Correo:</label>
                            <input type="email" name="correo" value="<?=$correo?>" class="form-control"
                                placeholder="E-mail" id="">
                        </div>
                        <br>
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
            </form>

            <br>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>id_usuario</th>
                        <th>Rut</th>
                        <th>nombre</th>
                        <th>Celular</th>
                        <th>Correo</th>
                        <th>Direccion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($lista as $proveedor) {
                        ?>
                    <tr>
                        <td><?=$proveedor['id_proveedor']?></td>
                        <td><?=$proveedor['rut']?></td>
                        <td><?=$proveedor['nombre']?></td>
                        <td><?=$proveedor['celular']?></td>
                        <td><?=$proveedor['correo']?></td>
                        <td><?=$proveedor['direccion']?></td>
                        <td>
                            <a href="../Controlador/proveedorController.php?eliminar=<?=$proveedor['id_proveedor']?>"
                                class="btn btn-danger btn-block">Eliminar</a>
                        </td>
                        <td>
                            <a href="proveedor.php?editar=<?=$proveedor['id_proveedor']?>"
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