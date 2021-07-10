<?php
include "connection.php";
$id=$_POST['idU'];
$nombre=$_POST['nombreU'];
$apellidos=$_POST['apellidosU'];

$sql = "UPDATE cliente SET nombre = '$nombre', apellido = '$apellidos' WHERE idCliente = '$id'";
echo mysqli_query($conexion,$sql);
?>