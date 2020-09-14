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
require_once ('../Modelo/productoModelo.php');
$producto=new Producto();
$lista=$producto->listar();
$tipos=$producto->consultaTipo();
$proveedores=$producto->consultaProveedor();
$id="";
$nombre="";
$precio="";
$tipo="";
$proveedor="";
$cantidad="";
$fecha="";
echo $id;
if (isset($_GET['editar'])) {
    $id=$_GET['editar'];
    $fila=$producto->consultar($id);
    $tipo=$fila['descripcion'];
    $proveedor=$fila['nombre'];
    $id=$fila['id_producto'];
    $idT=$fila['tipoProducto'];
    $idP=$fila['proveedor'];

    $nombre=$fila['nombreP'];
    $precio=$fila['precioP'];
    $tipo=$fila['tipoProducto'];
    $proveedor=$fila['proveedor'];
    $cantidad=$fila['cantidad'];
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
    <div class="container">
        <div class="card card-body">
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
            <form action="../Controlador/productoController.php" method="post">
                <h2>Registro producto</h2>
                <div class="row mx-4 my-4">
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$id?>" id="">
                            <label for="">Nombre:</label>
                            <input type="text" name="nombre" value="<?=$nombre?>" class="form-control" placeholder="Nombre" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Tipo Producto:</label>
                            <select name="tipo" class="form-control" id="">
                                <?php
                                    foreach ($tipos as $producto) {
                                        if ($tipo==$producto['descripcion']) {
                                           ?>
                                           <option value="<?=$idT?>"selected><?=$producto?></option>
                                           <?php
                                        }else {
                                            ?>
                                            <option value="<?=$producto['id_tipo']?>"><?=$producto['descripcion']?></option>
                                            <?php
                                        }
                                        ?>
                                         <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Cantidad:</label>
                            <input type="number" name="cantidad" value="<?=$cantidad?>" class="form-control" placeholder="Cantidad" id="">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Precio:</label>
                            <input type="number" name="precio" value="<?=$precio?>" class="form-control" placeholder="Precio" id="">
                            <input type="hidden" name="fecha" value="<?=$fecha?>" id="">

                        </div>
                        <div class="form-group">
                            <label for="">Proveedor:</label>
                            <select name="proveedor" class="form-control" id="">
                            <?php
                                    foreach ($proveedores as $producto) {
                                        if ($proveedor==$producto['nombre']) {
                                           ?>
                                           <option value="<?=$idP?>"selected><?=$producto?></option>
                                           <?php
                                        }else {
                                            ?>
                                            <option value="<?=$producto['id_proveedor']?>"><?=$producto['nombre']?></option>
                                            <?php
                                        }
                                        ?>
                                         <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <br>
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
            <br><br>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>id_Producto</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>tipoProducto</th>
                        <th>Proveedor</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($lista as $producto) {
                           ?>
                    <tr>
                        <td><?=$producto['id_producto']?></td>
                        <td><?=$producto['nombreP']?></td>
                        <td><?=$producto['precioP']?></td>
                        <td><?=$producto['descripcion']?></td>
                        <td><?=$producto['nombre']?></td>
                        <td><?=$producto['cantidad']?></td>
                        <td><?=$producto['fecha']?></td>
                        <td>
                            <a href="../Controlador/productoController.php?eliminar=<?=$producto['id_producto']?>" class="btn btn-danger btn-block">Eliminar</a>
                        </td>
                        <td>
                    <a href="producto.php?editar=<?=$producto['id_producto']?>" class="btn btn-warning btn-block">Editar</a>

                    </td>
                    </tr>
                           <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>