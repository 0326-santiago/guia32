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


    <link rel="stylesheet" href="../boostrap/css/body.css">


</head>
<?php
require_once ('../Modelo/tipoModelo.php');
$tipo=new Tipo();
$lista=$tipo->listar();
$id="";
$descripcion="";
if (isset($_GET['editar'])) {
    $id=$_GET['editar'];
    $fila=$tipo->consultar($id);
    $id=$fila['id_tipo'];
    $descripcion=$fila['descripcion'];

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

            <form action="../Controlador/tipoController.php" method="post">
                <h2> Tipo Producto</h2>
                <div class="row mx-4 my-4">
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$id?>" id="">
                            <label for="">Descripcion:</label>
                            <input type="text" name="descripcion" value="<?=$descripcion?>"  placeholder="descripcion" class="form-control" id="">
                        </div>
                        <?php
                        if (isset($_GET['editar'])) {
                           ?>
                            <input type="submit" name="editar" value="Actualizar" class="btn btn-success " class="form-control" id="">

                           <?php
                        }else {
                            ?>
                             <input type="submit" name="insertar" value="Agregar" class="btn btn-success " class="form-control" id="">

                            <?php
                        }
                        ?>
                    </div>

                </div>
            </form>
        </div>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>id_Tipo</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
               <?php
                    foreach ($lista as $tipo) {
                        ?>
                <tr>
                    <td><?=$tipo['id_tipo']?></td>
                    <td><?=$tipo['descripcion']?></td>
                    <td>
                        <a href="../Controlador/tipoController.php?eliminar=<?=$tipo['id_tipo']?>" class="btn btn-danger btn-block">Eliminar</a>
                    </td>
                    <td>
                    <a href="tipoProducto.php?editar=<?=$tipo['id_tipo']?>" class="btn btn-warning btn-block">Editar</a>

                    </td>
                </tr>
                        <?php
                    }
               ?>
            </tbody>
        </table>
    </div>
</body>

</html>