<?php
    session_start();
    include ('conexion.php');
    $conexion=conexion();

    $salida="";
    $sql="SELECT * FROM usuario";
    $resultado = $conexion->query($sql);

    if($resultado->num_rows > 0){
        $salida.=
        '<table class="table table-sm">
                <tr class="table-warning" style="text-align: center;">
                    <th>ID</th>
                    <th>USUARIO</th>
                    <th>CORREO</th>
                    <th>TIPO</th>
                    <th>OPCIONES</th>
                </tr>';
        while($fila = $resultado->fetch_assoc()){
            $salida.=
            '<tr>
                <th style="text-align: center;">'.$fila['id_usuario'].'</td>
                <td>'.$fila['usuario'].'</td>
                <td style="text-align: center;">'.$fila['correo'].'</td>
                <td style="text-align: center;">'.$fila['tipo'].'</td>
                <td style="text-align: center;">';
                if($fila['id_usuario']!="1"){
                    $salida.=
                    '<button value ="'.$fila['id_usuario'].'" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#ModalActUser" onclick="cargardatosuser(this);">Actualizar</button> 
                    <button value ="'.$fila['id_usuario'].'"class="btn btn-danger btn-sm" onclick="eliminaruserSiNo(this);">Eliminar </button>';
                }
                $salida.=
                '</td>
            </tr>';
        }
        $salida.='<table>';
    }

    echo $salida;
?>