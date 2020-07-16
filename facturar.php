<?php 
    session_start();
    include ('conexion.php');
    $conexion=conexion();
    $idme=$_POST['idme'];  
    $idfac=$_POST['idfac'];  
    $cant=$_POST['cant']; 

    $sql="INSERT into detallefactura (id_fact,id_med,cant_med) values ('$idfac','$idme','$cant')";
    
    echo mysqli_query($conexion,$sql);
         
    mysqli_close($conexion);
?>