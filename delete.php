<?php
include "connection.php";
$id=$_POST['idU'];
$sql = "DELETE FROM cliente WHERE idCliente = '$id'";
echo mysqli_query($conexion,$sql);
?>