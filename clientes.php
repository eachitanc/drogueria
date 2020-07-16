<?php 
    session_start();
    if(isset($_SESSION['usuario'])){
        if($_SESSION['tipo']=='cliente' || $_SESSION['tipo']=='admin'){
            include ('crear_factura.php');
        }
?>
<?php include ('estilo.php')?>
 <body style="background-color:#4BFC9640;" onload="datoscompras()">
<?php include ('encabezado.php')?>
        <div id="lista_compras" style="padding: 15px; height: 462px; margin-left: 20px;">
            <label style="color: cornflowerblue;">Te damos la bienvenida </label> <?php echo $_SESSION['usuario']?>
            <h5 align="center" style="color: darkblue;"><b>LISTA DE MEDICAMENTO</b> </h5>
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <div class="md-form input-group mb-2">
                            <input type="text" class="form-control pl-0 rounded-0" id="buscar_dat" placeholder="Buscar">
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary px-3" id="btnBuscarMed"><i class="fas fa-search prefix"></i></button>
                    </div>
                </div>
                <div class="overflow-auto mb-3 mb-md-0 mr-md-2" id="listar_med" style="max-height: 290px">
                </div>
        </div>
        <div class="modal fade" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
            <div class="modal-dialog modal-notify modal-success" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead" style="font-size: 30px;">FACTURA</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarfactura();">
                    <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <div class="text-center" id="mostrar_factura">
                    
                    </div>
                </div>

                    <div class="modal-footer justify-content-center">
                        <button class="btn btn-outline-success waves-effect" onclick="cerrarfactura();">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
<?php include ('pie.php')?>
<?php
    }
    else{
        header("location:index.php");
    }
?>
<script type="text/javascript">
    function datoscompras(){
        $('#listar_med').load('listar_compra.php')
    }
    $(document).ready(function(){
        //BUSCAR MEDICAMENTO
        $("#btnBuscarMed").click(function(){
            var valor = document.getElementById("buscar_dat").value;  
            if(valor != ""){
                buscar_datos(valor);
            }
            else{
                buscar_datos();
            }
        });
        function buscar_datos(consulta){
            $.ajax({
                url: 'listar_compra.php',
                type:'POST',
                dataType:'html',
                data:{consulta, consulta},
            })
            .done(function(respuesta){
                $('#listar_med').html(respuesta);
            })

        }; 
        $("#btnComprar").click(function(){

        }); 
    });
    //AGREGAR AL CARRITO
    function datosclienteyfac(e){
        let id = e.value.split("|");
        let max = id[1];
        let idcantidad = "cm_"+id[0];
        let cant= $('#'+idcantidad).val();
        let idme=id[0];
        let idfac = id[2];

        if(cant==""){
            alertify.error("Ingresar cantidad");   
        }
        else{
            if (parseInt(cant)<1||parseInt(cant)>parseInt(max)) {
                alertify.error("Cantidad no disponible");                
            }
            else{
                $.ajax({
                    url: 'facturar.php',
                    type:'POST',
                    dataType:'html',
                    data:{idme: idme, idfac: idfac, cant:cant},

                    success:function(r){
                        if(r==1){
                            alertify.success("Producto agregado al carrito");
                        }
                        else{
                            alert("Error con el servidor");
                        }
                        
                    }
                });
            }
        }
    };
    //FACTURAR COMPRA
    function facturarcompra(e){
        let idfactu = e.value;

        $.ajax({
            url: 'facturarcompra.php',
            type:'POST',
            dataType:'html',
            data:{idfactu: idfactu},

            success:function(r){
                $('#mostrar_factura').html(r);                
            }
        });
    };
    //CANCELAR COMPRA 
    function cancelarcompra(c){
        let idfactur = c.value;
        $.ajax({
            url: 'cancelarcompra.php',
            type:'POST',
            dataType:'html',
            data:{idfactur: idfactur},

            success:function(r){
                if(r==1){
                    alertify.error("COMPRA CANCELADA");   
                }
                else{
                    alertify.error(r);        
                }
                     
            }
        });
    };
    
    function cerrarfactura(){
        window.location = "clientes.php";
    };
</script>