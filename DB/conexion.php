<?php
$user = "Cora";
$passwd = "Cora3022";
$bd = "Estudiantes";
$host = "localhost";
$conexion = mysqli_connect($host, $user, $passwd, $bd);
/*if($conexion){
echo("Conexión Satisfactoria");
}else{
echo ("Error en la Conexión");
}*/
/*$sql = "INSERT INTO `users`(`user`, `passwd`) VALUES ('juan','121212')";
// echo json_encode($sql);
if (mysqli_query($conexion, $sql)) {
    echo "New record created successfully";
} else {
    echo "<br>Error: " . $sql . "<br>" . mysqli_error($conexion);
}
mysqli_close($conn);*/
?>
