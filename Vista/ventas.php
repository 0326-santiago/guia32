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

<body style="background-image: url(img/wen.jpeg);">
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
        <div style="background-image: url(img/fon.jpg);" class="card card-body">
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
            <form action="" method="post">
                <h2>Generar Compra</h2>
                <div class="row mx-4 my-4">
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="hidden" name="id" id="">

                            <label for="">Cliente</label>
                            <select name="cliente" class="form-control" id="">

                            </select>
                            <div class="form-group">
                                <label for="">Vendida Por::</label>
                                <select name="vendida" class="form-control" id="">
    
                                </select>
                            </div>
                        </div >
                        
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Producto:</label>
                            <select name="producto" class="form-control" id="">

                            </select>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-success btn-block " name="insertar" value="Generar" id="">
                        </div >
                        
                       
                    </div>


            </form>
            <br><br>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>id_Venta</th>
                        <th>Cliente</th>
                        <th>Producto</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>