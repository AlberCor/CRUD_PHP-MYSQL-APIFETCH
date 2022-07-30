<?php
include('../DB/conexion.php');
$iduser=$_POST['iduser'];
$users = $_POST['userUpdate'];
$pass = $_POST['passUpdate'];
if ($users == "" || $pass == "") {
    echo json_encode("error");
} else {
    $sql = "update users set user='".$users."',passwd='".$pass."' where iduser=".$iduser;
    if (mysqli_query($conexion, $sql)) {
        echo json_encode("Datos actualizados");
    } else {
        //echo json_encode("error");
       // echo 'mensaje'.mysqli_error($conexion);
    }
    mysqli_close($conexion);
}
?>