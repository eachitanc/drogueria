<?php 
    session_start();
    include "conexion.php";
    $conexion=conexion();
    $nombre=$_POST['nombre'];
    $correo=$_POST['email'];
    $contrasena=sha1($_POST['contrasena']);
    if($_POST["tipouser"]=="1"){
        $tipo="admin";
    }
    else{
        if($_POST["tipouser"]=="2"){
            $tipo="vendedor";
        }
        else{
            $tipo="cliente";
        }
    }  
    $sql="INSERT into usuario (usuario,correo,contrasena,tipo) values ('$nombre','$correo','$contrasena','$tipo')";
    echo mysqli_query($conexion,$sql);
    mysqli_close($conexion);
?>