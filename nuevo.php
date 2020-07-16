<?php
    session_start();
    include ('conexion.php');
    $conexion=conexion();
    $idMed=$_POST['id_med'];
    $nomMed=$_POST['nom_med'];
    $cantMed=$_POST['cant_med'];
    $valUnit=$_POST['val_unit'];

    $sql="INSERT into medicamentos (id_medicamento,nom_medicamento,cant_med_disp,val_unitario) values ('$idMed','$nomMed','$cantMed','$valUnit')";
    echo mysqli_query($conexion,$sql);
    mysqli_close($conexion);
?>