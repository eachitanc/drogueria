<?php 
    session_start();
    if($_SESSION['tipo']=="admin"){
        include ('estilo.php');
        
?>
<body style="background-color:#4BFC9640;" onload="listar_usuarios()">
<?php include ('encabezado.php')?>
<div class="row" style="height: 436px; margin: 15px;">
    <!--nuevo-->
    <div class="col-sm-4">
        <form method="POST" id="form_reg_admin">
            <div class="tab-content">
                <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                    <div class="modal-body mb-1">
                        <div class="md-form form-sm mb-4">
                            <i class="fas fa-user prefix blue-text"></i>
                            <input type="text" id="nombre" name="nombre" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="nombre">Nombre de usuario</label>
                        </div>
                        <div class="md-form form-sm mb-4">
                            <i class="fas fa-envelope prefix green-text"></i>
                            <input type="email" id="email" name="email" class="form-control form-control-sm validate" required>
                            <label data-error="wrong" data-success="right" for="email">Correo electrónico</label>
                        </div>
                        <div class="md-form form-sm mb-4">
                            <i class="fas fa-lock prefix red-text pr-3"></i>
                            <input type="password" id="contrasena" name="contrasena" class="form-control form-control-sm validate" required>
                            <label data-error="wrong" data-success="right" for="contrasena">Contraseña</label>
                        </div>
                        <div class="md-form form-sm mb-4">
                            <i class="fas fa-user-lock prefix amber-text"></i>
                            <input type="number" id="tipouser" name="tipouser" min="1" max="2" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="tipouser">Tipo de usuario</label>
                        </div>
                        <div class="text-center mt-2">
                            <input type="submit" class="btn btn-info" id="registrar_admin" value="Registrar">       
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--Listar-->
    <div class="col-sm-8">
        <div align="center">
            <button id="btnListUser" class="btn btn-blue-grey btn-sm" onclick="listar_usuarios();">Listar</button>
        </div>
        <div class="overflow-auto mb-3 mb-md-0 mr-md-2" id="listar_usuarios" style="max-height: 350px;padding-top: 10px;">
           
        </div>
    </div>
</div>
<!-- formulario para actualizar datos-->           
<div class="modal fade" id="ModalActUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info modal-sl" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead" style="font-size: 30px;"> Actualizar datos de usuarios</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body" id="datos_act"> 
                <form method="POST" id="formActual_admin">
                    <div class="tab-content">
                        <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                            <div class="modal-body mb-1">
                                <input hidden type="number" id="iduser_act" name="iduser_act">
                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-user prefix blue-text"></i>
                                    <input placeholder="Nombre" type="text" id="nombre_act" name="nombre_act" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="nombre_act">Nombre de usuario</label>
                                </div>
                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-envelope prefix green-text"></i>
                                    <input placeholder="Correo"  type="email" id="email_act" name="email_act" class="form-control form-control-sm validate" required>
                                    <label data-error="wrong" data-success="right" for="email_act">Correo electrónico</label>
                                </div>
                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-user-lock prefix amber-text"></i>
                                    <input placeholder="Tipo"  type="number" id="tipouser_act" name="tipouser_act" min="1" max="3" class="form-control validate">
                                    <label data-error="wrong" data-success="right" for="tipouser_act">Tipo de usuario</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm"  id="btnActuser" name="btnActuser">Actualizar</button>
                        <button type="button" class="btn btn-deep-purple btn-sm" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>                               
            </div>
        </div>
    </div>
</div>

<?php 
    include ('pie.php');  
    }
    else{
        echo "<h2>Usuario no permitido</h2>";
    }
?>


<script type="text/javascript">
    $(document).ready(function () {
        ////AJAX REGISTRO USUARIO - ADMIN
        $("#form_reg_admin").bind("submit",function(){
            var datos=$("#form_reg_admin").serialize(); 
            $.ajax({
                type: 'POST',
                url: 'registro.php',
                data:datos,
                success: function(r){
                    if(r==1){
                        $("#form_reg_admin")[0].reset();
                        $("#listar_usuarios").load('listar_usuarios.php');  
                        alertify.success("Usuario registrado correctamente");
                    }
                    else{
                        alertify.error("usuario y/o correo ya existen");
                    }
                }
            });
            return false;
        });
        //AJAX ACTUALIZAR USUARIO
        $("#formActual_admin").bind("submit",function(){
            var datosu=$("#formActual_admin").serialize();
            if( $("#iduser_act").val()== ""){
                return false;
            } 
            $.ajax({
                type: 'POST',
                url: 'actualizar_usuario.php',
                data:datosu,
                success: function(r){
                    
                    if(r==1){
                        $("#formActual_admin")[0].reset();
                        $("#listar_usuarios").load('listar_usuarios.php');
                        alertify.success("Usuario Actualizado correctamente");
                    }
                    else{
                        alertify.error("Error en el servidor");
                    }
                }
            });
            return false;
        });
    });
    //listar usuarios
    function listar_usuarios(){
        $.ajax({
                type: 'POST',
                url: 'listar_usuarios.php',
                success: function(r){
                    $("#listar_usuarios").html(r);
                }
            });
            return false;
    };
    //CARGAR DATOS DE USER
    function cargardatosuser(e){
        let ideuser= e.value;
        $.ajax({
            type: 'POST',
            url: 'cargar_usuario.php',
            data:{ideuser:ideuser},
            success: function(r){
                ponerdatos(r);
            }    
        });
    };
    function ponerdatos(d){
        let datosuser =  d.split("|"); 
        $("#iduser_act").val(datosuser[0]);
        $("#nombre_act").val(datosuser[1]);
        $("#email_act").val(datosuser[2]);
        $("#tipouser_act").val(datosuser[3]);        
    }
    //ELIMINAR USUARIO
    function eliminaruserSiNo(id){
        alertify.confirm('Eliminar Dato', '¿Está seguro de eliminar este registro?', 
        function(){ eliminarDatosUser(id) }, 
        function(){ alertify.error('Operacion cancelada')});
    };

    function eliminarDatosUser(id){
        let ideuser = id.value;
        $.ajax({
            url: 'elimina_user.php',
            type:'POST',
            dataType:'html',
            data:{ideuser:ideuser},
            success: function(r){
                if(r==1){
                    $("#listar_usuarios").load('listar_usuarios.php');  
                    alertify.success("Usuario eliminado correctamente");
                }
                else{
                    alertify.error("Problemas con el servidor");
                }
            }
        });
    };
</script>