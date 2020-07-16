<?php
    session_start();
    include ('conexion.php');
    $conexion=conexion();
    $idfactur =$_POST['idfactur'];

    $sql="DELETE FROM detallefactura WHERE id_fact = '$idfactur'";
    $resultado =  mysqli_query($conexion,$sql);
    echo $resultado;
?>