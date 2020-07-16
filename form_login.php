<?php
    session_start();
?>
<?php include ('estilo.php')?>
 <body style="background-color:#4BFC9640;">
<div id="fondo">
    <div align="center">
        <img src="images/nomdro.png" alt="drogueria" style="height: 130px; width: 400px; padding-top: 20px;" >
    </div>
    <form method="POST" id="formlogin">
        <div class="modal-dialog cascading-modal nav aqua-gradient py-5 mb-4 z-depth-5" id="div_login">
            <div class="modal-content">
                <div class="modal-c-tabs">
                    <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1 indigo-text pr-3"></i>
                        Iniciar Sesión</a>
                    </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                            <div class="modal-body mb-1">
                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-user prefix blue-text"></i>
                                    <input type="text" id="user" name="user" class="form-control validate" required>
                                    <label data-error="wrong" data-success="right" for="user">Usuario</label>
                                </div>
                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-lock prefix cyan-text pr-3"></i>
                                    <input type="password" name="contra" class="form-control form-control-sm validate" required>
                                    <label data-error="wrong" data-success="right" for="contra">Contraseña</label>
                                </div>
                                <div id="respuesta_log" style="color:red; font-size: 15px;" align="center">
                                </div>
                                <div class="text-center mt-2">
                                    <input type="submit" class="btn btn-info" id="btnEntrar" value="Entrar">
                                    <br>
                                    <a href="form_registro.php" class="blue-text">Registrarse</a></p>
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
        $("#formlogin").bind("submit",function(){
            var datos=$("#formlogin").serialize();
            $.ajax({
                type: 'POST',
                url: 'login.php',
                data:datos,
                success: function(res){
                    if(res==1){
                        window.location = "inicio.php";
                    }
                    else{
                        alertify.error("Usuario y/o contraseña incorrectos");
                    }
                }
            });
            return false;
        });
    });
</script>