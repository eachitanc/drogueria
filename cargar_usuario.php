<?php 
    session_start();
    include ('conexion.php');
    $conexion=conexion();
    $idus=$_POST['ideuser'];
    
    $sql="SELECT * FROM usuario WHERE id_usuario='$idus'";
    $resultado = $conexion->query($sql);

    if($resultado->num_rows > 0){
        $fila = $resultado->fetch_assoc();
        if($fila['tipo']=="admin"){
            $tipo=1;
        }
        else{
            if($fila['tipo']=="vendedor"){
                $tipo=2;
            }
            else{
                $tipo=3;
            }
        }  
        $valores=$fila['id_usuario']."|".$fila['usuario']."|".$fila['correo']."|".$tipo;
    }
    else{
        $valores=0;
    }
    echo $valores;
?>