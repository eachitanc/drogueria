<?php 
    session_start();
    if(isset($_SESSION['usuario']) && ($_SESSION['tipo']=="admin" ||$_SESSION['tipo']=="vendedor") ){
?>
<?php include ('estilo.php')?>
 <body style="background-color:#4BFC9640;" onload="datosinventario()">
<?php include ('encabezado.php')?>
            <div style="height: 462px; padding: 20px" >
                <div>
                    <div align="center">
                        <button type="button" class="btn btn-success" id="btnNuevo">Nuevo</button>
                        <button type="button" class="btn btn-info" id="btnListar">Listar</button> 
                    </div>
                    <!-- formulario para nuevos datos-->
                    <div id="for_nuevo" style="display: none;">
                        <br>
                        <h5 align="center" style="color: darkblue;"><b>AGREGAR NUEVO MEDICAMENTO</b> </h5>
                        <form method="POST" id="form_nuev_med">
                            <div class="row">
                                <div class="col">
                                    <div class="md-form input-with-pre-icon">
                                        <i class="fas fa-barcode input-prefix cyan-text pr-3"></i>
                                        <input required type="text" id="id_med" name="id_med" class="form-control">
                                        <label for="id_med">ID medicamento</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="md-form input-with-pre-icon">
                                        <i class="fas fa-font input-prefix indigo-text pr-3"></i>
                                        <input type="text" id="nom_med" name="nom_med" class="form-control">
                                        <label for="nom_med">Nombre del medicamento </label>
                                    </div>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col">
                                    <div class="md-form input-with-pre-icon">
                                        <i class="fas fa-plus input-prefix light-green-text pr-3"></i>
                                        <input required type="number" id="cant_med" name="cant_med" class="form-control" min="1">
                                        <label for="cant_med">Cantidad</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="md-form input-with-pre-icon">
                                        <i class="fas fa-money-bill-alt input-prefix green-text pr-3"></i>
                                        <input type="number" id="val_unit" name="val_unit" class="form-control" min="1">
                                        <label for="val_unit">Valor Unitario </label>
                                    </div>
                                </div>
                            </div>   
                            <div class="col" align="center">
                                <input type="submit" id="btnAgregar" class="btn btn-dark-green" name="btnAgregar" value="Agregrar">
                                <button type="reset" class="btn btn-amber">Cancelar</button>
                            </div>
                        </form>
                    </div>
                    <!-- formulario para actualizar datos-->           
                    <div class="modal fade" id="centralModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-notify modal-info modal-lg" role="document">
                        <!--Content-->
                        <div class="modal-content">
                            <!--Header-->
                            <div class="modal-header">
                                <p class="heading lead" style="font-size: 30px;"> Actualizar datos de medicamento</p>
                        
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="white-text">&times;</span>
                                </button>
                            </div>
                    
                            <!--Body-->
                            <div class="modal-body" id="datos_act"> 
                                <form method="POST" id="form_act_med">
                                    <div class="row">
                                        <div class="col">
                                            <div class="md-form input-with-pre-icon">
                                                <i class="fas fa-barcode input-prefix cyan-text pr-3"></i>
                                                <input placeholder="ID" type="text" id="id_med_act" name="id_med_act" class="form-control" readonly>
                                                <label for="id_med_act">ID medicamento</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="md-form input-with-pre-icon">
                                                <i class="fas fa-font input-prefix indigo-text pr-3"></i>
                                                <input placeholder="Nombre" type="text" id="nom_med_act" name="nom_med_act" class="form-control">
                                                <label for="nom_med_act">Nombre del medicamento </label>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="row">
                                        <div class="col">
                                            <div class="md-form input-with-pre-icon">
                                                <i class="fas fa-plus input-prefix light-green-text pr-3"></i>
                                                <input required placeholder="Cantidad" type="number" id="cant_med_act" name="cant_med_act" class="form-control" min="1">
                                                <label for="cant_med_act">Cantidad</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="md-form input-with-pre-icon">
                                                <i class="fas fa-money-bill-alt input-prefix green-text pr-3"></i>
                                                <input placeholder="Valor" type="number" id="val_unit_act" name="val_unit_act" class="form-control" min="1">
                                                <label for="val_unit_act">Valor Unitario </label>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-success btn-sm"  id="btnActualizar" name="btnActualizar" value="Actualizar">
                                        <button type="button" class="btn btn-deep-purple btn-sm" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </form>                               
                            </div>
                        </div>
                        </div>
                    </div>
                    <!--Listar-->
                    <div id="busqueda_listar">
                        <h5 align="center" style="color: darkblue;"><b>LISTA DE MEDICAMENTO</b> </h5>
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <div class="md-form input-group mb-2">
                                    <input type="text" class="form-control pl-0 rounded-0" id="buscar_med" placeholder="Buscar">
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-primary px-3" id="btnBuscar"><i class="fas fa-search prefix"></i></button>
                            </div>
                        </div>
                        <div class="overflow-auto mb-3 mb-md-0 mr-md-2" id="for_listar" style="max-height: 282px">
                        </div>
                    </div>
                </div>
            </div>

<?php include ('pie.php') ?>
<?php
    }
    else{
        header("location:clientes.php");
    }
?>

<script type="text/javascript">
    function datosinventario(){
        $("#for_listar").load('listar.php');
    };
    $(document).ready(function(){
		$("#btnNuevo").on( "click", function() {
			$('#for_nuevo').show();
            $('#busqueda_listar').hide();
		});
        $("#btnListar").on( "click", function() {
			$('#for_nuevo').hide();
            $('#busqueda_listar').show();

            $("#for_listar").load('listar.php');
		});

        //Ajax formulario nuevo
        $("#form_nuev_med").bind("submit",function(){
            var datos=$("#form_nuev_med").serialize(); 
            $.ajax({
                type: 'POST',
                url: 'nuevo.php',
                data:datos,
                success: function(r){
                    if(r==1){
                        $("#form_nuev_med")[0].reset();
                        alertify.success("Agregado Correctamente")
                    }
                    else{
                        alertify.error("Error, verificiar nuevamente");
                    }
                }
            });
            return false;
        });
        //BUSCAR MEDICAMENTO POR NOMBRE
        $("#btnBuscar").click(function(){
            var valor = document.getElementById("buscar_med").value;  
            if(valor != ""){
                buscar_datos(valor);
            }
            else{
                buscar_datos();
            }
        });
        function buscar_datos(consulta){
            $.ajax({
                url: 'listar.php',
                type:'POST',
                dataType:'html',
                data:{consulta, consulta},
            })
            .done(function(respuesta){
                $('#for_listar').html(respuesta);
            })

        };  
        //Ajax ACTUALIZAR
        $("#form_act_med").bind("submit",function(){
            var datos=$("#form_act_med").serialize(); 
            if($("#id_med_act").val()==""){
                return false;
            }
            $.ajax({
                type: 'POST',
                url: 'actualizar_med.php',
                data:datos,
                success: function(r){
                    if(r==1){
                        $("#form_act_med")[0].reset();
                        alertify.success("Actualización exitosa")
                        $("#for_listar").load('listar.php');

                    }
                    else{
                        alertify.error("Error en el servidor")
                        $("#for_listar").load('listar.php');
                    }
                }
            });
            return false;
        });

        
    });   
    //ACTUALIZAR MEDICAMENTOS
    function cargardatos(e){
        console.log(e.value);
        let id = e.value.split("|");

        $("#id_med_act").val(id[0]);
        $("#nom_med_act").val(id[1]);
        $("#cant_med_act").val(id[2]);
        $("#val_unit_act").val(id[3]);
    };
    //ELIMINAR MEDICAMENTOS
    function eliminarSiNo(id){
        alertify.confirm('Eliminar Dato', '¿Está seguro de eliminar este registro?', 
            function(){ eliminarDatos(id) }, 
            function(){ alertify.error('Cancel')});
    };

    function eliminarDatos(id){
        console.log(id.value);
        let ident = id.value;
        $.ajax({
            url: 'elimina_med.php',
            type:'POST',
            dataType:'html',
            data:{ident:ident},

            success: function(r){
                if(r==1){
                    alertify.success("Registro eliminado correctamente");
                    $("#for_listar").load('listar.php');
                }
                else{
                    alertify.error("Problemas con el servidor");
                }
            }
        });
    };
</script>