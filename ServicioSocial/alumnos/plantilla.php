

<link rel="stylesheet" type="text/css" href="../css/css.css">
<link rel="stylesheet" type="text/css" href="../bootsTrap2/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../bootsTrap2/css/bootstrap-responsive.css"/>

<script src="../bootsTrap2/js/jquery.min.js"></script>
<script src="../bootsTrap2/js/bootstrap.js"></script>

<!--Adobe Edge Runtime-->
<script type="text/javascript" charset="utf-8" src="koko_edgePreload.js"></script>
<style>
    .edgeLoad-EDGE-3614109 { visibility:hidden; }
</style>
<!--Adobe Edge Runtime End-->

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style>
    body{ 
        background: url(galeria/backgroundfinal.png)  center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Portal de Alumnos Ing. Industrial</title>
</head>
<header style="">
    <div class="container"  style="background-image: url(galeria/fondo.png); background-size: 100% 100%; height: 40%; border-radius: 5px">
        <div id="Stage" class="EDGE-3614109">
        </div>
    </div>
    <div class="container"> 
        <div class="navbar navbar-inverse">
            <div class="navbar-inner">

                <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <!-- Be sure to leave the brand out there if you want it shown -->
                <ul class="nav">
                    <li><div class="btn-group">
                            <a class="btn btn-primary" href="#"><i class="icon-user icon-white"></i> Usuario</a>
                            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="icon-pencil"></i> Editar</a></li>
                                <li><a href="#"><i class="icon-trash"></i>Borrar</a></li>
                                <li><a href="#"><i class="icon-ban-circle"></i>Banear</a></li>
                                <li class="divider"></li>
                                <li><a href="cerrarSesion.php"><i class="icon-remove"></i>Salir</a></li>
                            </ul>
                        </div></li>  
                    <li class="divider-vertical"></li>
                    <li class="active"><a>Portal Alumnos</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="#myModal" data-toggle="modal">Regitro de Usuario</a> </li>
                    <li><a href="">Calificaciones</a> </li>
                </ul>
                <!-- Everything you want hidden at 940px or less, place within here -->
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li><a href="cargaArchivos.php">Creditos Extra</a> </li>
                        <li class="divider-vertical"></li>
                        <li><a href="cargaMaterias.php">Creacion de grupos</a> </li>
                        <li class="divider-vertical"></li>
                        <li><a href="encuestaTutorias.php">Tutorias</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php include './datosPersonales.php'; ?>
</header>

