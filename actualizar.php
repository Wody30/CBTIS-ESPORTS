<?php
$conexion = new mysqli("localhost", "root", "", "esports");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$mail = $_POST['mail'];
$videojuego = $_POST['videojuego'];

$sql = "UPDATE registros 
        SET nombre='$nombre', mail='$mail', videojuego='$videojuego' 
        WHERE id=$id";

$conexion->query($sql);
$conexion->close();

header("Location: registros.php");
?>
