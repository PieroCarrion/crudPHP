<?php
include "connection.php";
$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];

$sql = "INSERT INTO cliente (apellido,nombre) VALUES ('$nombre','$apellidos')";
echo mysqli_query($conexion,$sql);
?> 
