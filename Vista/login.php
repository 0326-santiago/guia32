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

<body>
  <header style="background-color:#5344;" class="header-section">
    <div class="container-fluid">
      <div class="inner-header">
        <div class="logo">

          <ul>

            ROSS DRESS FOR LESS

          </ul>
        </div>

      </div>
    </div>
  </header>
</body>

</html>





<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: login.php');
  }
  require 'conexion.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password, rol FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      $_SESSION['user_rol']= $results['rol'];
      if($_SESSION['user_rol']==0){
        header("Location: index1.html");
      }
    } else {
      $message = 'lo siento, cuenta no encontrada o los datos son incorrectos';
    }
  }

?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="assets/style.css">
</head>

<body>

  <?php if(!empty($message)): ?>
  <p> <?= $message ?></p>
  <?php endif; ?>

  <h1>Inicia sesión</h1>
  ó <span><a href="signup.php"> crea una cuenta</a></span>

  <form action="login.php" method="POST">
    <input name="email" type="text" placeholder="ingrese su correo">
    <input name="password" type="password" placeholder="Ingrese su contraseña">
    <input type="submit" value="entrar">
  </form>


  <br>
  <br>
  <a href="index.php">Volver</a>

</body>



<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/main.js"></script>

</html>