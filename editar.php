<?php
$conexion = new mysqli("localhost","root","","esports");

$id = $_GET['id'];

$sql = "SELECT * FROM registros WHERE id=$id";
$resultado = $conexion->query($sql);
$fila = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Editar Registro</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<header>
    <h1>Editar registro</h1>
    <nav>
        <a href="index.html">Inicio</a>
        <a href="acerca.html">Acerca de</a>
        <a href="contacto.html">Contacto</a>
        <a href="registros.php">Registros</a>
    </nav>
</header>

<div class="contenido">
    <h2>Modificar información del jugador</h2>

    <form action="actualizar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

        <label>Nametag:
            <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>" required>
        </label>

        <label>Correo:
            <input type="text" name="mail" value="<?php echo $fila['mail']; ?>" required>
        </label>

        <label>Videojuego:
            <input type="text" name="videojuego" value="<?php echo $fila['videojuego']; ?>" required>
        </label>

        <button type="submit">Actualizar</button>
    </form>
</div>

<footer>
    <p>© 2025 Club eSports</p>
</footer>

</body>
</html>
