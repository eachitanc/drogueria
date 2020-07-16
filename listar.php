<?php
    session_start();
    include ('conexion.php');
    $conexion=conexion();

    $salida="";
    $sql="SELECT * FROM medicamentos";

    if(isset($_POST["consulta"])){
        $sql ="SELECT * FROM  medicamentos  WHERE nom_medicamento LIKE '%".$_POST['consulta']."%'"; 
    }
    $resultado = $conexion->query($sql);

    if($resultado->num_rows > 0){
        $salida.=
        '<table class="table table-sm">
                <tr class="table-warning" style="text-align: center;">
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>CANTIDAD DISPONIBLE</th>
                    <th>VALOR UNITARIO</th>
                    <th>OPCIONES</th>
                </tr>';
        while($fila = $resultado->fetch_assoc()){
            $datosmed=$fila['id_medicamento']."|".$fila['nom_medicamento']."|".$fila['cant_med_disp']."|".$fila['val_unitario'];
            $salida.=
            '<tr>
                <th style="text-align: center;">'.$fila['id_medicamento'].'</td>
                <td>'.$fila['nom_medicamento'].'</td>
                <td style="text-align: center;">'.$fila['cant_med_disp'].'</td>
                <td style="text-align: center;">'.$fila['val_unitario'].'</td>
                <td style="text-align: center;">
                    <button value ="'.$datosmed.'" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#centralModalInfo" onclick="cargardatos(this);">Actualizar</button> 
                    <button value ="'.$fila['id_medicamento'].'"class="btn btn-danger btn-sm" onclick="eliminarSiNo(this);">Eliminar </button>
                </td>
            </tr>';
        }
        $salida.='<table>';
    }
    else{
        $salida='<h6 style="color:red">No se encontraron resultados</h6>';
    }

    echo $salida;
?>