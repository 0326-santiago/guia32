<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROSS DRESS FOR LESS</title>

    <link rel="stylesheet" href="../boostrap/css/bootstrap.min.css">
    <script src="../boostrap/js/jquery-3.4.1.min.js"></script>
    <script src="../boostrap/js/bootstrap.min.js"></script>
    <script src="../boostrap/js/popper.min.js"></script>
</head>
<?php
require_once ('../Modelo/rolModelo.php');
$roles=new Roles();
$lista=$roles->listar();
$id="";
$rol="";
if (isset($_GET['editar'])) {
    $id=$_GET['editar'];
    $fila=$roles->consultar($id);
    $id=$fila['id'];
    $rol=$fila['rol_nombre'];

}
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-5">
            <div class="card card-body">
                <h1> Roles</h1>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" id="">
                        <label for="">Rol:</label>
                        <input type="text" name="rol" class="form-control" placeholder="Rol" id="">
                    </div>
                        <input type="submit" name="insertar" id="">
                </form>
            </div>
        </div>
        <br>
        <div class="col-5">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>id_Rol</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                        foreach ($lista as $roles) {
                           ?>
                     <tr>
                        <td><?=$roles['id_rol']?></td>
                        <td><?=$roles['rol_nombre']?></td>
                        <td>
                            <a href="" class="btn btn-danger btn-block">Eliminar</a>
                        </td>
                        <td>
                        <a href="" class="btn btn-warning btn-block">Editar</a>
                        </td>
                    </tr>
                           <?php
                        }
                   ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


</body>

</html>