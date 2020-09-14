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

            ROSS DRESS FOR DRESS
          </ul>
        </div>

      </div>
    </div>
  </header>
</body>

</html>
<?php
  session_start();

  require 'conexion.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>

<head>
  <header>

  </header>

  <meta charset="utf-8">
  <title>Welcome to you WebApp</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="assets/style.css">
</head>

<body>

  <?php if(!empty($user)): ?>
  <br><?= $user['email']; ?>
  <br>
  <a href="logout.php">
    Logout
  </a>
  <?php else: ?>
  <h1>Bienvenido</h1>
  <ul>
    <nav class="main-menu mobile-menu">
      <a href="login.php">Iniciar sesion</a> ó
      <a href="signup.php">Crear cuenta</a>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>

      <a href="login2.php">Iniciar como administrador</a>
  </ul>
  </nav>
  <?php endif; ?>
  <div class="single-slider-item set-bg" data-setbg="img/slider-23.jpg">
    <div class="container">
      <div class="row">

      </div>
    </div>
  </div>
</body>

</html>