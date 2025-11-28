<?php
// Datos de conexión
$host = "localhost";
$user = "root";
$pass = "";
$db   = "esports";

$con = mysqli_connect($host, $user, $pass, $db);

// Verificar conexión
if (!$con) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

$nombre     = $_POST['nombre'];
$mail       = $_POST['mail'];
$videojuego = $_POST['videojuego'];

// Insertar datos en la tabla 'registros'
$query = "INSERT INTO registros (nombre, mail, videojuego)
          VALUES ('$nombre', '$mail', '$videojuego')";

$insertado = mysqli_query($con, $query);

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro Completado</title>
    <link rel="stylesheet" href="estilos.css">
    <meta http-equiv="refresh" content="3;url=index.html"> <!-- Redirige después de 3 segundos -->
    <style>
        body {
            background-color: #111;
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .mensaje {
            max-width: 500px;
            margin: 150px auto;
            background-color: #1a1a1a;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(224, 57, 70, 0.5);
        }
        a {
            color: #e63946;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        h2 {
            color: #e63946;
        }
    </style>
</head>
<body>

<div class="mensaje">
    <?php if($insertado): ?>
        <h2>¡Registro completado con éxito!</h2>
        <p>Serás redirigido a la página principal en unos segundos.</p>
        <p>Si no, haz clic <a href="index.html">aquí</a>.</p>
    <?php else: ?>
        <h2>Error al registrar</h2>
        <p>Ocurrió un problema. Intenta nuevamente.</p>
        <p>Regresa al <a href="contacto.html">formulario</a>.</p>
    <?php endif; ?>
</div>

</body>
</html>
