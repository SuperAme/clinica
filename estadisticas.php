<?php 
    require 'php/conexionSAE.php';
    require 'php/conexion.php';
    session_start();
    $usuario = $_SESSION['usuario']['nombre_usuario'];    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fullcalendar.min.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/bootstrap-clockpicker.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/moment.min.js"></script>	
	<script src="js/fullcalendar.min.js"></script>
	<script src="js/es.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="js/recep.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/consulta.js"></script>
    <script type="text/javascript" src="js/consultac.js"></script>
	<script src="js/bootstrap-clockpicker.js"></script>
    <title>DERMA - DF</title>
</head>
<body>
<header>
<img src="img/cintillo-administracion.png" class="img-fluid">
<div id="nav" class="container-fluid">
    <ul class="nav nav-ul">
        <li class="nav-item">
            <img src="img/administrador_icono.png">
            Hola <?php echo $usuario?>
        </li>   
        <li>
            <a class="nav-link" href="php/logout.php">Cerrar Sesión</a>
        </li>
    </ul>
</div>
</header>
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <table class="table">
                <thead>
                    <h2>Pacientes en Espera</h2>
                    <tr>
                        <th>Nombre</th>
                        <th>Hora llegada</th>
                        <th>Tiempo espera</th>
                        <th>Hora cita</th>
                    </tr>
                </thead>
                <tbody class="listc">
                    
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <table class="table">
                <thead>
                    <h2>Pacientes en Consulta</h2>
                    <tr>
                        <th>Nombre</th>
                        <th>Cubículo</th>
                        <th>Servicio</th>
                    </tr>
                </thead>
                <tbody class="liste">

                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>