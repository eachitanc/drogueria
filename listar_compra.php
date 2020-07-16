<?php
    session_start();
    include ('conexion.php');
    $conexion=conexion();
    $cliente =$_SESSION['usuario'];

    $hoy = date('Y-m-d', mktime(0, 0, 0, date('m'),date('d')-1,date('Y')));

    $salida="";
    $sql="SELECT * FROM medicamentos";
    $query="SELECT * FROM factura WHERE id_cliente='$cliente' order by id_fac DESC";

    if(isset($_POST["consulta"])){
        $sql ="SELECT * FROM  medicamentos  WHERE nom_medicamento LIKE '%".$_POST['consulta']."%'"; 
    }
    $resultado = $conexion->query($sql);
    $resul = $conexion->query($query);
    $row = $resul->fetch_assoc();
    if($resultado->num_rows > 0){
        $salida.=
        '<table class="table table-sm">
                <tr class="table-warning" style="text-align: center;">
                    <th>NOMBRE</th>
                    <th>CANTIDAD DISPONIBLE</th>
                    <th>CANTIDAD A COMPRAR</th>
                    <th>VALOR UNITARIO</th>
                    <th>AÑADIR AL CARRO</th>
                </tr>';
        while($fila = $resultado->fetch_assoc()){
            $datosmed=$fila['id_medicamento']."|".$fila['cant_med_disp']."|".$row['id_fac'];
            $salida.=
            '<tr align="center">
                <td align="left">'.$fila['nom_medicamento'].'</td>
                <td>'.$fila['cant_med_disp'].'</td>
                <td align="center"><input id="cm_'.$fila['id_medicamento'].'" class="form-control" type="number" style="background-color: #A9C3B4; color: white;width: 150px; height: 30px; border-radius: 5px; border:none;">
                </td>
                <td>'.$fila['val_unitario'].'</td>
                <td>
                    <button value ="'.$datosmed.'" class="btn btn-success btn-sm px-3" id="btnComprar" onclick="datosclienteyfac(this);"><i class="fas fa-cart-plus prefix"></i></button>
                </td>
            </tr>';
        }
        
        $salida.='<table>';
        $salida.=
        '<div align="center">
            <button value="'.$row['id_fac'].'" class="btn btn-success" id="btnFacturarCompra" onclick="facturarcompra(this);" data-toggle="modal" data-target="#modalSuccess">Realizar Comprar</button>
            <button value="'.$row['id_fac'].'" class="btn btn-red" id="btnCancelarCompra" onclick="cancelarcompra(this);">Cancelar Compra</button>
        </div>';
    }
    else{
        $salida='<h6 style="color:red">No se encontraron resultados</h6>';
    }

    echo $salida;
?>