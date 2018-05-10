<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>gestPYMES</title>
        <?php include 'link.php'; 
            //session_start(); 
        ?>

    </head>

    <body>
        <header>
            <!-- Navigation -->
            <nav class="navbar navbar-expand-xl navbar-dark bg-dark fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <h2>gestPYMES</h2>
                    </a>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><span class="oi oi-home"></span>&nbsp;Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><span class="oi oi-globe"></span>&nbsp;Nosotros</a>
                            </li>
                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle" href="#" id="servicios" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="oi oi-menu"></span>&nbsp;Servicios</a>
                                <div class="dropdown-menu text-light bg-dark" aria-labelledby="servicios">
                                    <a class="dropdown-item text-muted" href="#">Empresa</a>
                                    <a class="dropdown-item text-muted" href="#">Empleado</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><span class="oi oi-location"></span>&nbsp;Contacto</a>
                            </li>
                            <!-- <li class="nav-item" >
                                <a class="nav-link"  href="#" data-toggle="modal" data-target="#loginModal"><span class="oi oi-account-login"></span>&nbsp;Acceso</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" text-center text-primary id="exampleModalLabel"><span class="oi oi-account-login"></span>&nbsp;Iniciar sesión</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="logica/login.php" method="post" role="form" class="login" data-form="login">

                                <div class="form-group">
                                    <label><span class="oi oi-person"></span>&nbsp;Nombre de usuario</label>
                                    <input type="text" class="form-control" name="nombre-login" placeholder="Escribe tu usuario" required=""/>
                                </div>
                                <div class="form-group">
                                    <label><span class="oi oi-lock-locked"></span>&nbsp;Contraseña</label>
                                    <input type="password" class="form-control" name="clave-login" placeholder="Escribe tu contraseña" required=""/>
                                </div>

                                <p>¿Cómo iniciarás sesión?</p>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" value="empleado" checked>
                                        Empleado
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" value="administrador">
                                        Empresa
                                    </label>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">Iniciar sesión</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                                </div>
                                <div class="RespuestaLogin" style="width: 100%; text-align: center; margin: 0;"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
 
