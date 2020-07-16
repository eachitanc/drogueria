<?php
    session_start();
    include ('conexion.php');
    $conexion=conexion();
    $id=$_POST['ideuser'];

    $sql="DELETE FROM usuario WHERE id_usuario = '$id'";

    $resultado =  mysqli_query($conexion,$sql);
    echo $resultado;
?>