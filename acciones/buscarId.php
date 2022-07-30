<?php
include('../DB/conexion.php');
$valor=file_get_contents("php://input");
$sql = "select * from users where iduser=".$valor;
$result = mysqli_query($conexion, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
echo json_encode($row);
?>