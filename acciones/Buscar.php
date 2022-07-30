<?php
include ("../DB/conexion.php");

$sql="select * from users";
if($result=mysqli_query($conexion,$sql)){
    $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach($row as $dato){
        echo "<tr>
        <td>".$dato['iduser']."</td>
        <td>".$dato['user']."</td>
        <td>".$dato['passwd']. "</td>
        <td>
            <button><i class='fa-regular fa-circle-xmark'></i></button>
            <button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#exampleModal' onclick=searchRegId('".$dato['iduser']."')>Actualizar</button>
            <button class='btn btn-danger' onclick=deleteReg('".$dato['iduser']."')>Eliminar</button>
        </td>
        </tr>";
    }
   // echo json_encode($row);
}else{
    echo json_encode("ERROR: Could not able to execute $sql. ");
}
mysqli_close($conexion);
//$result="";
?>