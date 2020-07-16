<?php 
    session_start();
    include ('conexion.php');
    $conexion=conexion();
    $iduser=$_POST["iduser_act"];
    $nomuser=$_POST["nombre_act"];
    $emailuser=$_POST["email_act"];
    if($_POST["tipouser_act"]=="1"){
        $tipouser="admin";
    }
    else{
        if($_POST["tipouser_act"]=="2"){
            $tipouser="vendedor";
        }
        else{
            $tipouser="cliente";
        }
    }  

    $sql="UPDATE usuario SET usuario = '$nomuser' , correo = '$emailuser', tipo='$tipouser' WHERE id_usuario='$iduser'";
    
    echo mysqli_query($conexion,$sql);
    mysqli_close($conexion);

?>