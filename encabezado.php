<nav class="mb-1 navbar navbar-expand-lg navbar-dark aqua-gradient py-2">
            <a class="navbar-brand" href="inicio.php"><img src="images/log.png" alt="logo" style="width: 70px; height: 70px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
            aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                <ul class="nav justify-content-center py-3 font-weight-bolder">
                    <li class="nav-item">
                        <a class="nav-link " href="inicio.php" >INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link <?php if($_SESSION['tipo']=='admin' || $_SESSION['tipo']=='vendedor'){echo 'enabled';} else{ echo 'disabled';}?>" href="inventario.php">Inventario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($_SESSION['tipo']=='vendedor'){echo 'disabled';} else{ echo 'enabled';} ?>" href="clientes.php" >Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($_SESSION['tipo']=='admin'){echo 'enabled';} else{ echo 'disabled';} ?>" href="gestion_usuarios.php">Gestion de Usuarios</a>
                    </li>
                </ul>
            </div>
        </div>
            <ul class="navbar-nav ml-auto nav-flex-icons">
                <div align="right">
                    <a href="cerrar_sesion.php" class="btn btn-default btn-rounded my-3" >Cerrar sesión</a>
                </div>
            </ul>
        </nav>