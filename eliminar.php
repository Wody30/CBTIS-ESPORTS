<?php
$conexion = new mysqli("localhost", "root", "", "esports");

$id = $_GET['id'];

$sql = "DELETE FROM registros WHERE id=$id";
$conexion->query($sql);

$conexion->close();

header("Location: registros.php");
?>
