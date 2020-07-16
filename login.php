<?php 
    session_start();
    include ('conexion.php');
    $conexion=conexion();
    $usuario=$_POST['user'];
    $pass=sha1($_POST['contra']);

    $sql="SELECT * from usuario  WHERE usuario='$usuario' and contrasena='$pass'";
    $resultado = $conexion->query($sql);
    
    if($resultado->num_rows > 0){
        $fila = $resultado->fetch_assoc();
        $_SESSION['usuario']=$usuario;
        $_SESSION['tipo']= $fila['tipo'];
        echo 1;

    }
    else{
        echo 0; 
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>