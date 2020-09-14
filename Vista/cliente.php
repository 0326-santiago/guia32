<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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



    

    <?php
    require_once ('../Modelo/clienteModelo.php');
    $cliente=new Cliente ();
    $lista=$cliente->listar();

    $id="";
    $documento="";
    $nombre="";
    $celular="";
    $correo="";
    $direccion="";
    $ciudad="";
    $fecha="";

    if (isset($_GET['editar'])) {
        $id=$_GET['editar'];
        $fila=$cliente->consultar($id);
        $id=$fila['id_cliente'];
        $documento=$fila['documentoC'];
        $nombre=$fila['nombreC'];
        $celular=$fila['celularC'];
        $correo=$fila['correoC'];
        $direccion=$fila['direccionC'];
        $ciudad=$fila['ciudadC'];
        $fecha=$fila['fecha'];
        echo $direccion;

    }
    ?>
</head>

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
    <br><br>
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
            <form action="../Controlador/clienteController.php" method="post">
                <h2> Registro Clientes</h2>
                <div class="row mx-4 my-4">
                   
                    <div class="col-md-5">
                       
                        <div class="form-group">
                            <input type="hidden" value="<?=$id?>" name="idC" id="" class="form-control">
                            <label for="">Documento:</label>
                            <input type="number" name="documento" class="form-control" value="<?=$documento?>"
                                placeholder="Ingrese el Documento" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Celular:</label>
                            <input type="number" name="celular" class="form-control" value="<?=$celular?>"
                                placeholder="N_° Celular" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Direccion:</label>
                            <input type="tezt" name="direccion" class="form-control" value="<?=$direccion?>"
                                placeholder="direccion" id="">
                        </div>
                        <?php
                   if (isset($_GET['editar'])) {
                       ?>
                    <input type="submit" class="btn btn-success " Value="Actualizar" name="editar" id="">
                    <?php
                   }else {
                      ?>
                    <input type="submit" class="btn btn-success " Value="Agregar" name="insertar" id="">
                    <?php
                        }
                    ?>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Nombre Completo:</label>
                            <input type="text" name="nombre" class="form-control" value="<?=$nombre?>"
                                placeholder="Ingrese el nombre" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Correo:</label>
                            <input type="email" name="correo" class="form-control" value="<?=$correo?>"
                                placeholder="Ingrese el correo" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Ciudad:</label>
                            <input type="text" name="ciudad" class="form-control" value="<?=$ciudad?>" placeholder="Ciudad"
                                id="">
                            <input type="hidden" value="<?=$fecha?>" name="fecha" id="" class="form-control">
                        </div>
                    </div>
                </div>
            </form>
            <br><br>
            <table class="table table-striped table-dark ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Celular</th>
                        <th>Correo</th>
                        <th>Direccion</th>
                        <th>Ciudad</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                                foreach ($lista as $cliente ) {
                                    ?>
                    <tr>
                        <td><?= $cliente['id_cliente']?></td>
                        <td><?= $cliente['documentoC']?></td>
                        <td><?= $cliente['nombreC']?></td>
                        <td><?= $cliente['celularC']?></td>
                        <td><?= $cliente['correoC']?></td>
                        <td><?= $cliente['direccionC']?></td>
                        <td><?= $cliente['ciudadC']?></td>
                        <td><?= $cliente['fecha']?></td>
                        <td>
                            <a href="../Controlador/clienteController.php?eliminar=<?=$cliente['id_cliente']?>"
                                class="btn btn-danger">Eliminar</a>
                        </td>
                        <td>
                            <a href="cliente.php?editar=<?=$cliente['id_cliente']?>" class="btn btn-warning">Editar</a>
                        </td>
                    </tr>
                    <?php
                                }
                                ?>
                </tbody>
            </table>
        </div>

    </div>
    
    <script class="text.javascript">
        $('.datepicker').picadate({
            selectMonths: true,
            selectYears: 10
        });
    </script>


   
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