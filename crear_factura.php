<?php 
    include ('conexion.php');
    $conexion=conexion();
    $cliente=$_SESSION['usuario'];
    $hoy = date('Y-m-d', mktime(0, 0, 0, date('m'),date('d'),date('Y')));

    $sql = "INSERT INTO factura (id_cliente, fecha_exp) VALUES ('$cliente','$hoy')";
    $res = mysqli_query($conexion,$sql);
    mysqli_close($conexion);
?>