<?php 
    session_start();
    include ('conexion.php');
    $conexion=conexion();
    $cliente =$_SESSION['usuario'];
    $hoy = date('Y-m-d', mktime(0, 0, 0, date('m'),date('d'),date('Y')));
    $idfactu =$_POST['idfactu'];
    $total=0;
    $salida="";
    $sql="SELECT * FROM medicamentos JOIN detallefactura JOIN factura on id_med=id_medicamento AND id_fact=id_fac WHERE id_fac='$idfactu'";
    $resultado = $conexion->query($sql);
    if($resultado->num_rows > 0){
        $salida.='
            <div>
                <div align="left">
                    <h3>Factura No.: '.$idfactu.' </h3> 
                    <div class="row">
                        <div class="col">
                            <p>Cliente : '.$cliente.'</p>
                        </div>
                        <div class="col">
                            <p>Fecha : '.$hoy.'</p>
                        </div>
                    </div>
                </div>
                <table class=" table table-sm" style="width: 100%;">
                    <thead class="table-primary">
                        <tr>
                            <th><strong>Cant.</strong></th>
                            <th><strong>Descripción</strong></th>
                            <th><strong>Valor Unitario</strong></th>
                            <th><strong>Total</strong></th>
                        </tr>
                    </thead>';
        while($fila = $resultado->fetch_assoc()){
            $idefactura=$fila['id_fact'];
            $idmed=$fila['id_medicamento'];
            $nmed=$fila['nom_medicamento'];
            $cdisp=$fila['cant_med_disp'];
            $ccomp=$fila['cant_med'];
            $valunit=$fila['val_unitario'];
            $subtot=$ccomp*$valunit;
            $cantnew=$cdisp - $ccomp;
            $total=$total+$subtot;
            $query ="UPDATE medicamentos SET cant_med_disp = '$cantnew' WHERE id_medicamento='$idmed'";
            $res = mysqli_query($conexion,$query);
            $salida.='
            <tr>
                <td>'.$ccomp. '</td>
                <td align="left">'.$nmed. '</td>
                <td align="right">'.$valunit. '</td>
                <td align="right">'.$subtot. '</td>
            </tr>';
        }
        $salida.='
            <caption><strong>TOTAL : '.$total.' </strong></caption>
            </table>    
        </div>';
        $consul ="UPDATE factura SET total = '$total' WHERE id_fac='$idefactura'";
        $resul = mysqli_query($conexion,$consul);
        echo $salida;
    }   
    else{
        echo $salida.='Primero debe agregar una compra';
    }
?>