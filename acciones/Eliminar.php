<?php
include("../DB/conexion.php");
$data=file_get_contents("php://input");
$sql="delete from users where iduser=".$data;
mysqli_query($conexion,$sql);
echo json_encode("success");
?>