<?php
    session_start();
?>
<?php include ('estilo.php')?>
 <body style="background-color:#4BFC9640;">
<div id="fondo">
    <form method="POST" id="formregistro">
        <div class="modal-dialog cascading-modal nav aqua-gradient py-5 mb-4 z-depth-5" id="div_registro">
            <div class="modal-content">
                <div class="modal-c-tabs">
                    <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1 indigo-text pr-3"></i>
                        Registro</a>
                    </li>
                    </ul>
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
                                <input hidden  type="number" id="tipouser" name="tipouser" value="3">
                                <div class="text-center mt-2">
                                    <input type="submit" class="btn btn-info" id="registrarse" value="Registrarse">       
                                    <br><br>
                                    <a href="form_login.php" class="blue-text">Iniciar sesión</a></p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#formregistro").bind("submit",function(){
            var datos=$("#formregistro").serialize(); 
            $.ajax({
                type: 'POST',
                url: 'registro.php',
                data:datos,
                success: function(r){
                    if(r==1){
                        $("#formregistro")[0].reset();
                        alertify.success("Usuario registrado correctamente");
                    }
                    else{
                        alertify.error("usuario y/o correo ya existen");
                    }
                }
            });
            return false;
        });
    });
</script>