<?php
session_start();

// Contraseña de acceso
$clave = "OLA123"; // <-- Cambia esto por tu contraseña

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pass = $_POST['password'];

    if ($pass === $clave) {
        $_SESSION['acceso'] = true;
        header("Location: registros.php");
        exit();
    } else {
        $error = "Contraseña incorrecta. Intenta de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Acceso a Registros</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            background: #111;
            padding: 30px;
            border-radius: 10px;
            color: white;
            text-align: center;
        }
        input[type=password] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: none;
        }
        button {
            padding: 10px 20px;
            border: none;
            background-color: #e63946;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
        }
        p.error {
            color: #ff5555;
        }
    </style>
</head>
<body>
<header>
        <img src="img/logo.png" alt="Logo eSports" class="logo">
        <h1>CBTIS eSports</h1>
        <nav>
  <a href="index.html">Inicio</a>
  <a href="acerca.html">Acerca de</a>
  
  <div class="dropdown">
    <button class="dropbtn">Mas opciones </button>
    <div class="dropdown-content">
      <a href="contacto.html">Contacto</a>
      <a href="registros.php">Registros</a>
    </div>
  </div>
</nav>

    </header>


<div class="login-container">
    <h2>Acceso a la página de registros</h2>

    <?php if($error != "") echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="password" name="password" placeholder="Ingresa la contraseña" required>
        <br>
        <button type="submit">Entrar</button>
    </form>
</div>

</body>
</html>
