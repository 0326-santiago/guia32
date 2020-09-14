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

  require 'conexion.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Cuenta creada con exito';
    } else {
      $message = 'Lo siento intenta con otra cuenta';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
  </head>
  <body>


    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Crea una cuenta</h1>
    <span>ó <a href="login.php">Inicia sesión</a></span>

    <form action="signup.php" method="POST">
      <input name="email" type="text" placeholder="Ingrese su correo">
      <input name="password" type="password" placeholder="Ingrese una contraseña">
      <input type="submit" value="Agregar">
    </form>

  </body>
  
</html>
