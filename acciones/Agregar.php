<?php
include ("../DB/conexion.php");
/*$user = "Cora";
$passwd = "Cora3022";
$bd = "Estudiantes";
$host = "localhost";
$conexion = mysqli_connect($host, $user, $passwd, $bd);*/

$users = $_POST['useradd'];
$pass = $_POST['passwd'];
if ($users == "" || $pass == "") {
    echo json_encode("error");
} else {
    $sql = "INSERT INTO users(user, passwd) VALUES ('".$users."','".$pass."')";
    if( mysqli_query($conexion, $sql)){
        echo json_encode("Datos almacenados...");
    }else{
        echo json_encode("error");
    }
   mysqli_close($conexion);
}
