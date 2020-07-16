<?php 
    session_start();
    include ('conexion.php');
    $conexion=conexion();
    $idMedic=$_POST["id_med_act"];
    $nomMedic=$_POST["nom_med_act"];
    $cantMedic=$_POST["cant_med_act"];
    $valMedic=$_POST["val_unit_act"];

    $sql="UPDATE medicamentos SET nom_medicamento = '$nomMedic', cant_med_disp = '$cantMedic' , val_unitario = '$valMedic' WHERE id_medicamento='$idMedic'";
    
    echo mysqli_query($conexion,$sql);
    mysqli_close($conexion);

?>