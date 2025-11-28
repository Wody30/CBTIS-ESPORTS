<?php
session_start();

if(!isset($_SESSION['acceso']) || $_SESSION['acceso'] !== true){
    header("Location: login.php");
    exit();
}
?>

<?php

$conexion = new mysqli("localhost", "root", "", "esports");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}


$busqueda = "";
if (isset($_GET['buscar'])) {
    $busqueda = $_GET['buscar'];
}

$sql = "SELECT * FROM registros 
        WHERE nombre LIKE '%$busqueda%' 
        ORDER BY id DESC";

$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registros - Club eSports</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<header>
    <h1>Registros de Jugadores</h1>
    <nav>
  <a href="index.html">Inicio</a>
  <a href="acerca.html">Acerca de</a>
  
  <div class="dropdown">
    <button class="dropbtn">Mas opciones </button>
    <div class="dropdown-content">
      <a href="contacto.html">Contacto</a>
      <a href="registros.php">Registros</a>
      <a href="logout.php">Cerrar sesión</a>
    </div>
  </div>
</nav>

</header>

<div class="contenido">
    <h2>Jugadores registrados</h2>


    <form method="GET" style="margin-bottom: 20px;">
        <input type="text" name="buscar" placeholder="Buscar por nombre..." value="<?php echo $busqueda; ?>">
        <button type="submit">Buscar</button>
    </form>


    <table>
        <tr>
            <th>Nametag</th>
            <th>Correo</th>
            <th>Videojuego</th>
            <th>Acciones</th>
        </tr>

        <?php
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>{$fila['nombre']}</td>
                        <td>{$fila['mail']}</td>
                        <td>{$fila['videojuego']}</td>
                        <td>
                            <a href='editar.php?id={$fila['id']}' style='color:#00aaff;'>Editar</a> |
                            <a href='eliminar.php?id={$fila['id']}' style='color:#ff3333;' onclick='return confirm(\"¿Seguro que deseas eliminar este registro?\")'>Eliminar</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No hay registros</td></tr>";
        }
        ?>
    </table>

</div>

<footer>
    <p>© 2025 Club eSports - Todos los derechos reservados</p>
</footer>

</body>
</html>

<?php $conexion->close(); ?>
