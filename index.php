<?php
    
?>

<!DOCTYPE html>
<html lang="es-MX">

<head>
   <title>LOGIN</title>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">
   <script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/jquery.js"></script>
   <script src="js/main.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
   
   <!-- Date Time Picker CSS -->        
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
   
   <!-- Main Style CSS -->
   <link href="css/styles.css" rel="stylesheet">
   <style>
       body{
           background-image: none;
       } 
   </style>
</head>
<body id="LoginForm">
  <img src="img/login-banner-final.png" style="width: 100%;" id= "bann" class ="bann">
    <div class="container-fluid">

       <div class="error">
           <span>Datos de Ingreso no válidos</span>
       </div>    
       <form id="Login" class="form-inline" action="">                
         <input type="text" id="inputVendedor" name="inputUser" pattern="[A-Za-z0-9_-]{1,20}" class="form-control" placeholder="Clave" required autofocus>
         <input type="password" id="inputPassword" name="inputPassword" pattern="[A-Za-z0-9_-]{1,20}" class="form-control" placeholder="Contraseña" required>       
         <!-- <input type="submit" class="botonlg" value="iniciar"/>-->
           <button type="submit" class="btn iniciar-btn" value="iniciar">Iniciar</button>
       </form>       
    </div>
  
    <footer class="footer-index">
        <div class="container">
            <span>Desarrollado por: <a href="http://www.pass.com.mx" target="_blank">PASS Consultores</a></span>
        </div>
    </footer>       
</body>
</html>