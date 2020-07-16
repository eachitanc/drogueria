<?php
    session_start();
    include ('conexion.php');
    $conexion=conexion();
    $id=$_POST['ident'];

    $sql="DELETE FROM medicamentos WHERE id_medicamento = '$id'";
    
    $resultado =  mysqli_query($conexion,$sql);
    echo $resultado;
?>