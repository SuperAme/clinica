<?php
    require 'php/conexionSAE.php';
    require 'php/conexion.php';
    session_start();
    $usuario = $_SESSION['usuario']['nombre_usuario'];
    $tipo = $_SESSION['usuario']['tipo'];
    if($tipo != 'R'){
        header('location: php/logout.php');
    }

?>
<!DOCTYPE html>
<html>
<head>	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<title>DERMA-DF</title>
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
</head>
<body>   
  <header>
  <img src="img/cintillo-recepcion.png" class="img-fluid">
  <div id="nav" class="container-fluid">
    <ul class="nav nav-ul">
        <li class="nav-item">
            <img src="img/recepcion_icono.png">
            Hola <?php echo $usuario?>
        </li>     
        <li>
          <a class="nav-link" href="php/logout.php">Cerrar Sesión</a>
        </li>
     </ul>
  </div>
</header>  
	<div class="container">
        <div class="row botones">
            <div class="col-12">
                <button id="todos" class="btn">Todos</button>
                <button id="ingreso" class="btn citado">Citado</button>
                <button class="btn confirmado">Confirmado</button>
                <button id="espera" class="btn btn-successA">Espera</button>
                <!--button class="btn ingreso">Ingreso</button>-->
                <button class="btn consulta">Consulta</button>
                <button class="btn terminado">Terminada</button>
            </div>
        </div>
    <div class="row">
        <div class="col-12"><div id="calendario"></div></div>          
    </div>
    <div class="row">
        <div class="col-12"><div id="calendario_e"></div></div><!--espera-->
    </div>
    <div class="row">
        <div class="col-12"><div id="calendario_g"></div></div><!--Citado-->
    </div>
    <div class="row">
        <div class="col-12"><div id="calendario_cf"></div></div><!--Confirmado-->
    </div>
    <div class="row">
        <div class="col-12"><div id="calendario_c"></div></div><!--consulta-->
    </div>
    <div class="row">
        <div class="col-12"><div id="calendario_t"></div></div><!--terminado-->
    </div>
  </div>
	<script>        
       $(document).ready(function(){
      
        var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            months = ["01","02","03","04","05","06","07","08","09","10","11","12"];
            Date.prototype.formatMMDDYYYY = function(){
                return months[this.getMonth()] + 
                "/" +  this.getDate() +
                "/" +  this.getFullYear();
            }

            var todaysDate = new Date();
        $("#todos").click(function(){
            $("#calendario_e").hide()
            $("#calendario_g").hide()
            $("#calendario_c").hide()
            $("#calendario_t").hide()
            $("#calendario_cf").hide()
            $("#calendario").toggle(1000);
        });
        $("#espera").click(function(){
            $("#calendario").hide();
            $("#calendario_g").hide()
            $("#calendario_c").hide()
            $("#calendario_t").hide()
            $("#calendario_cf").hide()
            $("#calendario_e").toggle(1000);
        });
        $("#ingreso").click(function(){
            $("#calendario").hide()
            $("#calendario_e").hide()
            $("#calendario_c").hide()
            $("#calendario_t").hide()
            $("#calendario_cf").hide()
            $("#calendario_g").toggle(1000);
        });
        $(".consulta").click(function(){
            $("#calendario").hide()
            $("#calendario_g").hide()
            $("#calendario_e").hide()
            $("#calendario_t").hide()
            $("#calendario_cf").hide()
            $("#calendario_c").toggle(1000);
        });
        $(".terminado").click(function(){
            $("#calendario").hide()
            $("#calendario_g").hide()
            $("#calendario_e").hide()
            $("#calendario_c").hide()
            $("#calendario_cf").hide()
            $("#calendario_t").toggle(1000);
        });
        $(".confirmado").click(function(){
            $("#calendario").hide()
            $("#calendario_g").hide()
            $("#calendario_e").hide()
            $("#calendario_c").hide()
            $("#calendario_t").hide()
            $("#calendario_cf").toggle(1000);
        });
        $('#calendario').fullCalendar({
            header:{
                left:'prev,today,next',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },
            
            dayClick:function(date,jsEvent,view){ 
                months = ["01","02","03","04","05","06","07","08","09","10","11","12"]                   
                var datClk = date.format()
                var fecha = new Date();
                var año = fecha.getFullYear()
                var mes = months[fecha.getMonth()]
                var dia = fecha.getDate()
                var fecha1 = año+"-"+mes+"-"+dia           
                   //var fechaSplit = fecha.split("T")
                if(new Date(datClk)< new Date(fecha1)){
                    document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    $("#generarIngreso").prop("disabled",true)
                    $("#insertarCita").prop("disabled",true)
                    $("#modificarCita").prop("disabled",true)
                    $("#borrarCita").prop("disabled",true)
                    $("#confirmarCita").prop("disabled",true)
                    limpiarFormulario()
                    $('#input_fecha').val(date.format())
                    var d = new Date()
                    var hI = d.getHours()+1
                    var hF = d.getHours()+2
                    var mI = '00';                                         
                    $("#input_horaini").val(hI+':'+mI)                       
                    $("#input_horafin").val(hF+':'+mI)           
                    $("#ModalEventos").modal()
                }else{
                    document.getElementById("insertarCita").setAttribute("style","background:#ef8cf9;border:1px solid #ef8cf9;")
                    document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    $("#insertarCita").prop("disabled",false)
                    $("#confirmarCita").prop("disabled",true)
                    $("#generarIngreso").prop("disabled",true)                       
                    $("#modificarCita").prop("disabled",true)
                    $("#borrarCita").prop("disabled",true)                       
                    limpiarFormulario()
                    $('#input_fecha').val(date.format())
                    var d = new Date()
                    var hI = d.getHours()+1
                    var hF = d.getHours()+2
                    var mI = '00';                                         
                    $("#input_horaini").val(hI+':'+mI)                       
                    $("#input_horafin").val(hF+':'+mI)           
                    $("#ModalEventos").modal()
                }
                    
               },
               events:'/clinica/eventos.php',                             
               timeFormat: 'HH:mm',
               eventRender: function(event, element) {
                   var s = "";
                   try{
                   var eventDate = new Date(event.start._i.split(" ")[0] + " " +event.tiempo_espera); 
                   var even = new Date(event.start._i)
                   //eventFechaHora = event.start._i.split(" ")
                   
                    eventFechaH = event.start._i.split(" ")[0] + " " +event.tiempo_espera
                    eventFechaHora = eventFechaH.split(" ")
                   
                    /*for(var t = 0; t < event.start; t++){
                      if(t == 2){
                        s += event.start[t] + " "
                      }else if(t >= 3 && t < 6){
                        s += event.start[t] + ":"
                      }else if(t == 6){
                        s += event.start[t]
                      }else{
                        s += event.start[t] + "-"
                      }
                    }
                    eventFechaHora = s.split(" ")*/
                   
                   var ArrEvFeHo = eventFechaHora[1]
                   var ArrEvFeHoMi = ArrEvFeHo.split(":")
                   var HoraEvento = ArrEvFeHoMi[0]+ArrEvFeHoMi[1]
                    if(todaysDate.formatMMDDYYYY() <= eventDate.formatMMDDYYYY() && todaysDate.formatMMDDYYYY() == eventDate.formatMMDDYYYY()) {
                        var status = event.estatus;
                         
                                               
                        if (status == 'Espera'){                            
                            /*Hora actual*/
                            var today = new Date()
                            var todayHours = today.getHours()
                            var todayMinutes = today.getMinutes()
                            
                            if (todayMinutes < 10) {
                                
                            }
                            var hora1 = parseInt(todayHours)+":"+parseInt(todayMinutes)
                            var hora1A = hora1.split(":")
                            if(hora1A[1] < 10){
                                var minhora1A = "0"+hora1A[1]
                            }else{
                                var minhora1A = hora1A[1]
                            }
                            var hora1AF = hora1A[0]+minhora1A
                            
                            var validacionMinutos = hora1AF - HoraEvento
                            if (validacionMinutos >= 15 && validacionMinutos < 30){
                                setInterval(function(){                                     
                                    element.addClass("parpadea")
                                    //element.fadeOut(900).delay(300).fadeIn(800);
                                },2000); 
                            } else if(validacionMinutos > 30){
                                setInterval(function(){                                     
                                    element.addClass("parpadea2")
                                    
                                },2000);                                
                            }else {
                                
                            }                            
                        }
                    }                   
                  }catch(error){
                    
                  }
                },
               eventClick: function(calEvent,jsEvent,view){

                var date = new Date()
                var today = date.getDate()                   
                $('#input_id').val(calEvent.id)
                $('#input_color').val(calEvent.color)
                $('#tituloEvento').html(calEvent.servicio)
                $('#input_paciente').val(calEvent.title)                  
                $('#input_doctor').val(calEvent.doctor)                   
                $('#input_doctor_asignado').val(calEvent.doctor_asignado)                  
                $('#input_enfermera').val(calEvent.enfermera)                  
                $('#input_status').val(calEvent.estatus)
                $('#input_rs').val(calEvent.razon_social)
                var status = calEvent.estatus
                $('#input_servicio').val(calEvent.servicio)                   
                $('#input_cubiculo').val(calEvent.cubiculo)
                FechaHora = calEvent.start._i.split(" ")
                FechaHoraFin = calEvent.end._i.split(" ")
                $('#input_fecha').val(FechaHora[0])                
                $('#input_horaini').val(FechaHora[1])                  
                $('#input_horafin').val(FechaHoraFin[1])                   
                $("#ModalEventos").modal()
                var today1 = FechaHora[0] 
                var todaySplit = today1.split("-")
                var todayArray = todaySplit[2]
                
                if(today == todayArray) {
                    console.log(status)                          
                    if($('#input_status').val() == 'Generado'){
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#57cbc0;border:1px solid #57cbc0;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;")                           
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",false)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false)                           
                    } else if($('#input_status').val() == 'Confirmado') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#0c6f0f;border:1px solid #0c6f0f;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",false)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    }else if($('#input_status').val() == 'Espera') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    } else if($('#input_status').val() == 'Consulta') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    } else if($('#input_status').val() == 'Terminada') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    }
                }else{
                    console.log(status)
                    if($('#input_status').val() == 'Generado'){
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#57cbc0;border:1px solid #57cbc0;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",false)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    } else if($('#input_status').val() == 'Confirmado') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    }else if($('#input_status').val() == 'Espera') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    } else if($('#input_status').val() == 'Consulta') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    } else if($('#input_status').val() == 'Terminada') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    }
                }               
            },
            editable:true,
            eventDrop: function(calEvent,delta,revertFunc){
                months = ["01","02","03","04","05","06","07","08","09","10","11","12"]                   
                var FechaDia = calEvent.start.format().split("T")
                var FechaDiaA = FechaDia[0]
                   //var dia = FechaDiaA[2]
                   //console.log(FechaDiaA)
                var date = new Date()
                var year = date.getFullYear()
                var month = months[date.getMonth()]
                var day = date.getDate()
                if (day < 10){
                    var day = "0"+day
                }
                
                var fecha = year.toString()+"-"+month.toString()+"-"+day.toString()
                
                   //console.log(fecha)
                if(FechaDiaA < fecha){
                    alert("ERROR! No puedes mover citas en días anteriores")
                    revertFunc()
                }else{
                    $('#input_id').val(calEvent.id);
                    $('#input_color').val(calEvent.color);
                    $('#tituloEvento').html(calEvent.servicio);
                    $('#input_paciente').val(calEvent.title);                   
                    $('#input_doctor').val(calEvent.doctor);                   
                    $('#input_doctor_asignado').val(calEvent.doctor_asignado);                   
                    $('#input_enfermera').val(calEvent.enfermera);                   
                    $('#input_status').val(calEvent.estatus)                  
                    $('#input_servicio').val(calEvent.servicio)                  
                    $('#input_cubiculo').val(calEvent.cubiculo)                   
                    var FechaHora = calEvent.start.format().split("T")                  
                    $('#input_fecha').val(FechaHora[0]);                   
                    $('#input_horaini').val(FechaHora[1]);                                      
                    var FechaHoraFin = calEvent.end.format().split("T");                   
                    $('#input_horafin').val(FechaHoraFin[1]);                   
                    RecolectarDatosGUI();
                    EnviarInformacion('modificar',NuevoEvento,true);
                }         
            },               
        });
        /*Calendario con citas en espera*/
        
        $('#calendario_e').fullCalendar({               
            header:{
                left:'prev,today,next',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },              
            dayClick:function(date,jsEvent,view){
                months = ["01","02","03","04","05","06","07","08","09","10","11","12"]                   
                var datClk = date.format()
                var fecha = new Date();
                var año = fecha.getFullYear()
                var mes = months[fecha.getMonth()]
                var dia = fecha.getDate()
                var fecha1 = año+"-"+mes+"-"+dia           
                   //var fechaSplit = fecha.split("T")
                if(new Date(datClk)< new Date(fecha1)){
                    document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    $("#generarIngreso").prop("disabled",true)
                    $("#insertarCita").prop("disabled",true)
                    $("#modificarCita").prop("disabled",true)
                    $("#borrarCita").prop("disabled",true)
                    $("#confirmarCita").prop("disabled",true)
                    limpiarFormulario()
                    $('#input_fecha').val(date.format())
                    var d = new Date()
                    var hI = d.getHours()+1
                    var hF = d.getHours()+2
                    var mI = '00';                                         
                    $("#input_horaini").val(hI+':'+mI)                       
                    $("#input_horafin").val(hF+':'+mI)           
                    $("#ModalEventos").modal()
                }else{
                    document.getElementById("insertarCita").setAttribute("style","background:#ef8cf9;border:1px solid #ef8cf9;")
                    document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    $("#insertarCita").prop("disabled",false)
                    $("#confirmarCita").prop("disabled",true)
                    $("#generarIngreso").prop("disabled",true)                       
                    $("#modificarCita").prop("disabled",true)
                    $("#borrarCita").prop("disabled",true)                       
                    limpiarFormulario()
                    $('#input_fecha').val(date.format())
                    var d = new Date()
                    var hI = d.getHours()+1
                    var hF = d.getHours()+2
                    var mI = '00';                                         
                    $("#input_horaini").val(hI+':'+mI)                       
                    $("#input_horafin").val(hF+':'+mI)           
                    $("#ModalEventos").modal()
                }                 
            },
            events:'/clinica/eventos_espera.php',
            timeFormat: 'HH:mm',
            eventRender: function(event, element) {
                var s = "";
                try{
                var eventDate = new Date(event.start._i.split(" ")[0] + " " +event.tiempo_espera); 
                var even = new Date(event.start._i)
                   //eventFechaHora = event.start._i.split(" ")
                   
                    eventFechaH = event.start._i.split(" ")[0] + " " +event.tiempo_espera
                    eventFechaHora = eventFechaH.split(" ")
                   
                    /*for(var t = 0; t < event.start; t++){
                      if(t == 2){
                        s += event.start[t] + " "
                      }else if(t >= 3 && t < 6){
                        s += event.start[t] + ":"
                      }else if(t == 6){
                        s += event.start[t]
                      }else{
                        s += event.start[t] + "-"
                      }
                    }
                    eventFechaHora = s.split(" ")*/
                   
                   var ArrEvFeHo = eventFechaHora[1]
                   var ArrEvFeHoMi = ArrEvFeHo.split(":")
                   var HoraEvento = ArrEvFeHoMi[0]+ArrEvFeHoMi[1]
                    if(todaysDate.formatMMDDYYYY() <= eventDate.formatMMDDYYYY() && todaysDate.formatMMDDYYYY() == eventDate.formatMMDDYYYY()) {
                        var status = event.estatus;
                         
                                               
                        if (status == 'Espera'){                            
                            /*Hora actual*/
                            var today = new Date()
                            var todayHours = today.getHours()
                            var todayMinutes = today.getMinutes()
                            
                            if (todayMinutes < 10) {
                                
                            }
                            var hora1 = parseInt(todayHours)+":"+parseInt(todayMinutes)
                            var hora1A = hora1.split(":")
                            if(hora1A[1] < 10){
                                var minhora1A = "0"+hora1A[1]
                            }else{
                                var minhora1A = hora1A[1]
                            }
                            var hora1AF = hora1A[0]+minhora1A
                            
                            var validacionMinutos = hora1AF - HoraEvento
                            if (validacionMinutos >= 15 && validacionMinutos < 30){
                                setInterval(function(){                                     
                                    element.addClass("parpadea")
                                    //element.fadeOut(900).delay(300).fadeIn(800);
                                },2000); 
                            } else if(validacionMinutos > 30){
                                setInterval(function(){                                     
                                    element.addClass("parpadea2")
                                    
                                },2000);                                
                            }else {
                                
                            }                            
                        }
                    }                   
                  }catch(error){
                    
                  }
                },
            eventClick: function(calEvent,jsEvent,view){
                var date = new Date()
                var today = date.getDate()                   
                $('#input_id').val(calEvent.id)
                $('#input_color').val(calEvent.color)
                $('#tituloEvento').html(calEvent.servicio)
                $('#input_paciente').val(calEvent.title)                  
                $('#input_doctor').val(calEvent.doctor)                   
                $('#input_doctor_asignado').val(calEvent.doctor_asignado)                  
                $('#input_enfermera').val(calEvent.enfermera)                  
                $('#input_status').val(calEvent.estatus)
                $('#input_rs').val(calEvent.razon_social)
                var status = calEvent.estatus
                $('#input_servicio').val(calEvent.servicio)                   
                $('#input_cubiculo').val(calEvent.cubiculo)
                FechaHora = calEvent.start._i.split(" ")
                FechaHoraFin = calEvent.end._i.split(" ")
                $('#input_fecha').val(FechaHora[0])                
                $('#input_horaini').val(FechaHora[1])                  
                $('#input_horafin').val(FechaHoraFin[1])                   
                $("#ModalEventos").modal()
                var today1 = FechaHora[0] 
                var todaySplit = today1.split("-")
                var todayArray = todaySplit[2]
                
                if(today == todayArray) {
                    console.log(status)                          
                    if($('#input_status').val() == 'Generado'){
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#57cbc0;border:1px solid #57cbc0;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;")                           
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",false)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false)                           
                    } else if($('#input_status').val() == 'Confirmado') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#0c6f0f;border:1px solid #0c6f0f;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",false)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    }else if($('#input_status').val() == 'Espera') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    } else if($('#input_status').val() == 'Consulta') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    } else if($('#input_status').val() == 'Terminada') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    }
                }else{
                    console.log(status)
                    if($('#input_status').val() == 'Generado'){
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#57cbc0;border:1px solid #57cbc0;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",false)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    } else if($('#input_status').val() == 'Confirmado') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    }else if($('#input_status').val() == 'Espera') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    } else if($('#input_status').val() == 'Consulta') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    } else if($('#input_status').val() == 'Terminada') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    }
                }
                
            },
            editable:true,
            eventDrop: function(calEvent,delta,revertFunc){
                months = ["01","02","03","04","05","06","07","08","09","10","11","12"]                   
                var FechaDia = calEvent.start.format().split("T")
                var FechaDiaA = FechaDia[0]
                   //var dia = FechaDiaA[2]
                   //console.log(FechaDiaA)
                var date = new Date()
                var year = date.getFullYear()
                var month = months[date.getMonth()]
                var day = date.getDate()
                if (day < 10){
                    var day = "0"+day
                }
                
                var fecha = year.toString()+"-"+month.toString()+"-"+day.toString()
                
                   //console.log(fecha)
                if(FechaDiaA < fecha){
                    alert("ERROR! No puedes mover citas en días anteriores")
                    revertFunc()
                }else{
                    $('#input_id').val(calEvent.id);
                    $('#input_color').val(calEvent.color);
                    $('#tituloEvento').html(calEvent.servicio);
                    $('#input_paciente').val(calEvent.title);                   
                    $('#input_doctor').val(calEvent.doctor);                   
                    $('#input_doctor_asignado').val(calEvent.doctor_asignado);                   
                    $('#input_enfermera').val(calEvent.enfermera);                   
                    $('#input_status').val(calEvent.estatus)                  
                    $('#input_servicio').val(calEvent.servicio)                  
                    $('#input_cubiculo').val(calEvent.cubiculo)                   
                    var FechaHora = calEvent.start.format().split("T")                  
                    $('#input_fecha').val(FechaHora[0]);                   
                    $('#input_horaini').val(FechaHora[1]);                                      
                    var FechaHoraFin = calEvent.end.format().split("T");                   
                    $('#input_horafin').val(FechaHoraFin[1]);                   
                    RecolectarDatosGUI();
                    EnviarInformacion('modificar',NuevoEvento,true);
                }         
            }
        });
        
        
        /*Calendario con citas en Ingreso*/
        
        $('#calendario_g').fullCalendar({               
            header:{
                left:'prev,today,next',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },              
            dayClick:function(date,jsEvent,view){
                months = ["01","02","03","04","05","06","07","08","09","10","11","12"]                   
                var datClk = date.format()
                var fecha = new Date();
                var año = fecha.getFullYear()
                var mes = months[fecha.getMonth()]
                var dia = fecha.getDate()
                var fecha1 = año+"-"+mes+"-"+dia           
                   //var fechaSplit = fecha.split("T")
                if(new Date(datClk)< new Date(fecha1)){
                    document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    $("#generarIngreso").prop("disabled",true)
                    $("#insertarCita").prop("disabled",true)
                    $("#modificarCita").prop("disabled",true)
                    $("#borrarCita").prop("disabled",true)
                    $("#confirmarCita").prop("disabled",true)
                    limpiarFormulario()
                    $('#input_fecha').val(date.format())
                    var d = new Date()
                    var hI = d.getHours()+1
                    var hF = d.getHours()+2
                    var mI = '00';                                         
                    $("#input_horaini").val(hI+':'+mI)                       
                    $("#input_horafin").val(hF+':'+mI)           
                    $("#ModalEventos").modal()
                }else{
                    document.getElementById("insertarCita").setAttribute("style","background:#ef8cf9;border:1px solid #ef8cf9;")
                    document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    $("#insertarCita").prop("disabled",false)
                    $("#confirmarCita").prop("disabled",true)
                    $("#generarIngreso").prop("disabled",true)                       
                    $("#modificarCita").prop("disabled",true)
                    $("#borrarCita").prop("disabled",true)                       
                    limpiarFormulario()
                    $('#input_fecha').val(date.format())
                    var d = new Date()
                    var hI = d.getHours()+1
                    var hF = d.getHours()+2
                    var mI = '00';                                         
                    $("#input_horaini").val(hI+':'+mI)                       
                    $("#input_horafin").val(hF+':'+mI)           
                    $("#ModalEventos").modal()
                }                  
            },
            events:'/clinica/eventos_ingreso.php',
            
            eventRender: function(event, element) {
                var s = "";
                try{
                var eventDate = new Date(event.start._i.split(" ")[0] + " " +event.tiempo_espera); 
                var even = new Date(event.start._i)
                   //eventFechaHora = event.start._i.split(" ")
                   
                    eventFechaH = event.start._i.split(" ")[0] + " " +event.tiempo_espera
                    eventFechaHora = eventFechaH.split(" ")
                   
                    /*for(var t = 0; t < event.start; t++){
                      if(t == 2){
                        s += event.start[t] + " "
                      }else if(t >= 3 && t < 6){
                        s += event.start[t] + ":"
                      }else if(t == 6){
                        s += event.start[t]
                      }else{
                        s += event.start[t] + "-"
                      }
                    }
                    eventFechaHora = s.split(" ")*/
                   
                   var ArrEvFeHo = eventFechaHora[1]
                   var ArrEvFeHoMi = ArrEvFeHo.split(":")
                   var HoraEvento = ArrEvFeHoMi[0]+ArrEvFeHoMi[1]
                    if(todaysDate.formatMMDDYYYY() <= eventDate.formatMMDDYYYY() && todaysDate.formatMMDDYYYY() == eventDate.formatMMDDYYYY()) {
                        var status = event.estatus;
                         
                                               
                        if (status == 'Espera'){                            
                            /*Hora actual*/
                            var today = new Date()
                            var todayHours = today.getHours()
                            var todayMinutes = today.getMinutes()
                            
                            if (todayMinutes < 10) {
                                
                            }
                            var hora1 = parseInt(todayHours)+":"+parseInt(todayMinutes)
                            var hora1A = hora1.split(":")
                            if(hora1A[1] < 10){
                                var minhora1A = "0"+hora1A[1]
                            }else{
                                var minhora1A = hora1A[1]
                            }
                            var hora1AF = hora1A[0]+minhora1A
                            
                            var validacionMinutos = hora1AF - HoraEvento
                            if (validacionMinutos >= 15 && validacionMinutos < 30){
                                setInterval(function(){                                     
                                    element.addClass("parpadea")
                                    //element.fadeOut(900).delay(300).fadeIn(800);
                                },2000); 
                            } else if(validacionMinutos > 30){
                                setInterval(function(){                                     
                                    element.addClass("parpadea2")
                                    
                                },2000);                                
                            }else {
                                
                            }                            
                        }
                    }                   
                  }catch(error){
                    
                  }
                },
            eventClick: function(calEvent,jsEvent,view){
                var date = new Date()
                var today = date.getDate()                   
                $('#input_id').val(calEvent.id)
                $('#input_color').val(calEvent.color)
                $('#tituloEvento').html(calEvent.servicio)
                $('#input_paciente').val(calEvent.title)                  
                $('#input_doctor').val(calEvent.doctor)                   
                $('#input_doctor_asignado').val(calEvent.doctor_asignado)                  
                $('#input_enfermera').val(calEvent.enfermera)                  
                $('#input_status').val(calEvent.estatus)
                $('#input_rs').val(calEvent.razon_social)
                var status = calEvent.estatus
                $('#input_servicio').val(calEvent.servicio)                   
                $('#input_cubiculo').val(calEvent.cubiculo)
                FechaHora = calEvent.start._i.split(" ")
                FechaHoraFin = calEvent.end._i.split(" ")
                $('#input_fecha').val(FechaHora[0])                
                $('#input_horaini').val(FechaHora[1])                  
                $('#input_horafin').val(FechaHoraFin[1])                   
                $("#ModalEventos").modal()
                var today1 = FechaHora[0] 
                var todaySplit = today1.split("-")
                var todayArray = todaySplit[2]
                
                if(today == todayArray) {
                    console.log(status)                          
                    if($('#input_status').val() == 'Generado'){
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#57cbc0;border:1px solid #57cbc0;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;")                           
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",false)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false)                           
                    } else if($('#input_status').val() == 'Confirmado') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#0c6f0f;border:1px solid #0c6f0f;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",false)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    }else if($('#input_status').val() == 'Espera') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    } else if($('#input_status').val() == 'Consulta') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    } else if($('#input_status').val() == 'Terminada') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    }
                }else{
                    console.log(status)
                    if($('#input_status').val() == 'Generado'){
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#57cbc0;border:1px solid #57cbc0;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",false)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    } else if($('#input_status').val() == 'Confirmado') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    }else if($('#input_status').val() == 'Espera') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    } else if($('#input_status').val() == 'Consulta') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    } else if($('#input_status').val() == 'Terminada') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    }
                }
                
            },
            editable:true,
            eventDrop: function(calEvent,delta,revertFunc){
                months = ["01","02","03","04","05","06","07","08","09","10","11","12"]                   
                var FechaDia = calEvent.start.format().split("T")
                var FechaDiaA = FechaDia[0]
                   //var dia = FechaDiaA[2]
                   //console.log(FechaDiaA)
                var date = new Date()
                var year = date.getFullYear()
                var month = months[date.getMonth()]
                var day = date.getDate()
                if (day < 10){
                    var day = "0"+day
                }
                
                var fecha = year.toString()+"-"+month.toString()+"-"+day.toString()
                
                   //console.log(fecha)
                if(FechaDiaA < fecha){
                    alert("ERROR! No puedes mover citas en días anteriores")
                    revertFunc()
                }else{
                    $('#input_id').val(calEvent.id);
                    $('#input_color').val(calEvent.color);
                    $('#tituloEvento').html(calEvent.servicio);
                    $('#input_paciente').val(calEvent.title);                   
                    $('#input_doctor').val(calEvent.doctor);                   
                    $('#input_doctor_asignado').val(calEvent.doctor_asignado);                   
                    $('#input_enfermera').val(calEvent.enfermera);                   
                    $('#input_status').val(calEvent.estatus)                  
                    $('#input_servicio').val(calEvent.servicio)                  
                    $('#input_cubiculo').val(calEvent.cubiculo)                   
                    var FechaHora = calEvent.start.format().split("T")                  
                    $('#input_fecha').val(FechaHora[0]);                   
                    $('#input_horaini').val(FechaHora[1]);                                      
                    var FechaHoraFin = calEvent.end.format().split("T");                   
                    $('#input_horafin').val(FechaHoraFin[1]);                   
                    RecolectarDatosGUI();
                    EnviarInformacion('modificar',NuevoEvento,true);
                }         
            }
        });
        
        /*Calendario con citas estatus confirmado*/
        $('#calendario_cf').fullCalendar({
            header:{
                left:'prev,today,next',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },              
            dayClick:function(date,jsEvent,view){ 
                months = ["01","02","03","04","05","06","07","08","09","10","11","12"]                   
                var datClk = date.format()
                var fecha = new Date();
                var año = fecha.getFullYear()
                var mes = months[fecha.getMonth()]
                var dia = fecha.getDate()
                var fecha1 = año+"-"+mes+"-"+dia           
                   //var fechaSplit = fecha.split("T")
                if(new Date(datClk)< new Date(fecha1)){
                    document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    $("#generarIngreso").prop("disabled",true)
                    $("#insertarCita").prop("disabled",true)
                    $("#modificarCita").prop("disabled",true)
                    $("#borrarCita").prop("disabled",true)
                    $("#confirmarCita").prop("disabled",true)
                    limpiarFormulario()
                    $('#input_fecha').val(date.format())
                    var d = new Date()
                    var hI = d.getHours()+1
                    var hF = d.getHours()+2
                    var mI = '00';                                         
                    $("#input_horaini").val(hI+':'+mI)                       
                    $("#input_horafin").val(hF+':'+mI)           
                    $("#ModalEventos").modal()
                }else{
                    document.getElementById("insertarCita").setAttribute("style","background:#ef8cf9;border:1px solid #ef8cf9;")
                    document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    $("#insertarCita").prop("disabled",false)
                    $("#confirmarCita").prop("disabled",true)
                    $("#generarIngreso").prop("disabled",true)                       
                    $("#modificarCita").prop("disabled",true)
                    $("#borrarCita").prop("disabled",true)                       
                    limpiarFormulario()
                    $('#input_fecha').val(date.format())
                    var d = new Date()
                    var hI = d.getHours()+1
                    var hF = d.getHours()+2
                    var mI = '00';                                         
                    $("#input_horaini").val(hI+':'+mI)                       
                    $("#input_horafin").val(hF+':'+mI)           
                    $("#ModalEventos").modal()
                }
                    
               },
               events:'/clinica/eventos_confirmado.php',
               timeFormat: 'HH:mm',
               eventRender: function(event, element) {
                   var s = "";
                   try{
                   var eventDate = new Date(event.start._i.split(" ")[0] + " " +event.tiempo_espera); 
                   var even = new Date(event.start._i)
                   //eventFechaHora = event.start._i.split(" ")
                   
                    eventFechaH = event.start._i.split(" ")[0] + " " +event.tiempo_espera
                    eventFechaHora = eventFechaH.split(" ")
                   
                    /*for(var t = 0; t < event.start; t++){
                      if(t == 2){
                        s += event.start[t] + " "
                      }else if(t >= 3 && t < 6){
                        s += event.start[t] + ":"
                      }else if(t == 6){
                        s += event.start[t]
                      }else{
                        s += event.start[t] + "-"
                      }
                    }
                    eventFechaHora = s.split(" ")*/
                   
                   var ArrEvFeHo = eventFechaHora[1]
                   var ArrEvFeHoMi = ArrEvFeHo.split(":")
                   var HoraEvento = ArrEvFeHoMi[0]+ArrEvFeHoMi[1]
                    if(todaysDate.formatMMDDYYYY() <= eventDate.formatMMDDYYYY() && todaysDate.formatMMDDYYYY() == eventDate.formatMMDDYYYY()) {
                        var status = event.estatus;
                         
                                               
                        if (status == 'Espera'){                            
                            /*Hora actual*/
                            var today = new Date()
                            var todayHours = today.getHours()
                            var todayMinutes = today.getMinutes()
                            
                            if (todayMinutes < 10) {
                                
                            }
                            var hora1 = parseInt(todayHours)+":"+parseInt(todayMinutes)
                            var hora1A = hora1.split(":")
                            if(hora1A[1] < 10){
                                var minhora1A = "0"+hora1A[1]
                            }else{
                                var minhora1A = hora1A[1]
                            }
                            var hora1AF = hora1A[0]+minhora1A
                            
                            var validacionMinutos = hora1AF - HoraEvento
                            if (validacionMinutos >= 15 && validacionMinutos < 30){
                                setInterval(function(){                                     
                                    element.addClass("parpadea")
                                    //element.fadeOut(900).delay(300).fadeIn(800);
                                },2000); 
                            } else if(validacionMinutos > 30){
                                setInterval(function(){                                     
                                    element.addClass("parpadea2")
                                    
                                },2000);                                
                            }else {
                                
                            }                            
                        }
                    }                   
                  }catch(error){
                    
                  }
                },
            eventClick: function(calEvent,jsEvent,view){
                var date = new Date()
                var today = date.getDate()                   
                $('#input_id').val(calEvent.id)
                $('#input_color').val(calEvent.color)
                $('#tituloEvento').html(calEvent.servicio)
                $('#input_paciente').val(calEvent.title)                  
                $('#input_doctor').val(calEvent.doctor)                   
                $('#input_doctor_asignado').val(calEvent.doctor_asignado)                  
                $('#input_enfermera').val(calEvent.enfermera)                  
                $('#input_status').val(calEvent.estatus)
                $('#input_rs').val(calEvent.razon_social)
                var status = calEvent.estatus
                $('#input_servicio').val(calEvent.servicio)                   
                $('#input_cubiculo').val(calEvent.cubiculo)
                FechaHora = calEvent.start._i.split(" ")
                FechaHoraFin = calEvent.end._i.split(" ")
                $('#input_fecha').val(FechaHora[0])                
                $('#input_horaini').val(FechaHora[1])                  
                $('#input_horafin').val(FechaHoraFin[1])                   
                $("#ModalEventos").modal()
                var today1 = FechaHora[0] 
                var todaySplit = today1.split("-")
                var todayArray = todaySplit[2]
                
                if(today == todayArray) {
                    console.log(status)                          
                    if($('#input_status').val() == 'Generado'){
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#57cbc0;border:1px solid #57cbc0;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;")                           
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",false)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false)                           
                    } else if($('#input_status').val() == 'Confirmado') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#0c6f0f;border:1px solid #0c6f0f;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",false)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    }else if($('#input_status').val() == 'Espera') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    } else if($('#input_status').val() == 'Consulta') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    } else if($('#input_status').val() == 'Terminada') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    }
                }else{
                    console.log(status)
                    if($('#input_status').val() == 'Generado'){
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#57cbc0;border:1px solid #57cbc0;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",false)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    } else if($('#input_status').val() == 'Confirmado') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    }else if($('#input_status').val() == 'Espera') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    } else if($('#input_status').val() == 'Consulta') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    } else if($('#input_status').val() == 'Terminada') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    }
                }               
            },
            editable:true,
            eventDrop: function(calEvent,delta,revertFunc){
                months = ["01","02","03","04","05","06","07","08","09","10","11","12"]                   
                var FechaDia = calEvent.start.format().split("T")
                var FechaDiaA = FechaDia[0]
                   //var dia = FechaDiaA[2]
                   //console.log(FechaDiaA)
                var date = new Date()
                var year = date.getFullYear()
                var month = months[date.getMonth()]
                var day = date.getDate()
                if (day < 10){
                    var day = "0"+day
                }
                
                var fecha = year.toString()+"-"+month.toString()+"-"+day.toString()
                
                   //console.log(fecha)
                if(FechaDiaA < fecha){
                    alert("ERROR! No puedes mover citas en días anteriores")
                    revertFunc()
                }else{
                    $('#input_id').val(calEvent.id);
                    $('#input_color').val(calEvent.color);
                    $('#tituloEvento').html(calEvent.servicio);
                    $('#input_paciente').val(calEvent.title);                   
                    $('#input_doctor').val(calEvent.doctor);                   
                    $('#input_doctor_asignado').val(calEvent.doctor_asignado);                   
                    $('#input_enfermera').val(calEvent.enfermera);                   
                    $('#input_status').val(calEvent.estatus)                  
                    $('#input_servicio').val(calEvent.servicio)                  
                    $('#input_cubiculo').val(calEvent.cubiculo)                   
                    var FechaHora = calEvent.start.format().split("T")                  
                    $('#input_fecha').val(FechaHora[0]);                   
                    $('#input_horaini').val(FechaHora[1]);                                      
                    var FechaHoraFin = calEvent.end.format().split("T");                   
                    $('#input_horafin').val(FechaHoraFin[1]);                   
                    RecolectarDatosGUI();
                    EnviarInformacion('modificar',NuevoEvento,true);
                }         
            }
        });
        /*Calendario con citas en consulta*/
        
        $('#calendario_c').fullCalendar({               
            header:{
                left:'prev,today,next',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },              
            dayClick:function(date,jsEvent,view){
                months = ["01","02","03","04","05","06","07","08","09","10","11","12"]                   
                var datClk = date.format()
                var fecha = new Date();
                var año = fecha.getFullYear()
                var mes = months[fecha.getMonth()]
                var dia = fecha.getDate()
                var fecha1 = año+"-"+mes+"-"+dia           
                   //var fechaSplit = fecha.split("T")
                if(new Date(datClk)< new Date(fecha1)){
                    document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    $("#generarIngreso").prop("disabled",true)
                    $("#insertarCita").prop("disabled",true)
                    $("#modificarCita").prop("disabled",true)
                    $("#borrarCita").prop("disabled",true)
                    $("#confirmarCita").prop("disabled",true)
                    limpiarFormulario()
                    $('#input_fecha').val(date.format())
                    var d = new Date()
                    var hI = d.getHours()+1
                    var hF = d.getHours()+2
                    var mI = '00';                                         
                    $("#input_horaini").val(hI+':'+mI)                       
                    $("#input_horafin").val(hF+':'+mI)           
                    $("#ModalEventos").modal()
                }else{
                    document.getElementById("insertarCita").setAttribute("style","background:#ef8cf9;border:1px solid #ef8cf9;")
                    document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    $("#insertarCita").prop("disabled",false)
                    $("#confirmarCita").prop("disabled",true)
                    $("#generarIngreso").prop("disabled",true)                       
                    $("#modificarCita").prop("disabled",true)
                    $("#borrarCita").prop("disabled",true)                       
                    limpiarFormulario()
                    $('#input_fecha').val(date.format())
                    var d = new Date()
                    var hI = d.getHours()+1
                    var hF = d.getHours()+2
                    var mI = '00';                                         
                    $("#input_horaini").val(hI+':'+mI)                       
                    $("#input_horafin").val(hF+':'+mI)           
                    $("#ModalEventos").modal()
                }                 
            },
            events:'/clinica/eventos_consulta.php',
            timeFormat: 'HH:mm',
            eventRender: function(event, element) {
                var s = "";
                try{
                var eventDate = new Date(event.start._i.split(" ")[0] + " " +event.tiempo_espera); 
                var even = new Date(event.start._i)
                   //eventFechaHora = event.start._i.split(" ")
                   
                    eventFechaH = event.start._i.split(" ")[0] + " " +event.tiempo_espera
                    eventFechaHora = eventFechaH.split(" ")
                   
                    /*for(var t = 0; t < event.start; t++){
                      if(t == 2){
                        s += event.start[t] + " "
                      }else if(t >= 3 && t < 6){
                        s += event.start[t] + ":"
                      }else if(t == 6){
                        s += event.start[t]
                      }else{
                        s += event.start[t] + "-"
                      }
                    }
                    eventFechaHora = s.split(" ")*/
                   
                   var ArrEvFeHo = eventFechaHora[1]
                   var ArrEvFeHoMi = ArrEvFeHo.split(":")
                   var HoraEvento = ArrEvFeHoMi[0]+ArrEvFeHoMi[1]
                    if(todaysDate.formatMMDDYYYY() <= eventDate.formatMMDDYYYY() && todaysDate.formatMMDDYYYY() == eventDate.formatMMDDYYYY()) {
                        var status = event.estatus;
                         
                                               
                        if (status == 'Espera'){                            
                            /*Hora actual*/
                            var today = new Date()
                            var todayHours = today.getHours()
                            var todayMinutes = today.getMinutes()
                            
                            if (todayMinutes < 10) {
                                
                            }
                            var hora1 = parseInt(todayHours)+":"+parseInt(todayMinutes)
                            var hora1A = hora1.split(":")
                            if(hora1A[1] < 10){
                                var minhora1A = "0"+hora1A[1]
                            }else{
                                var minhora1A = hora1A[1]
                            }
                            var hora1AF = hora1A[0]+minhora1A
                            
                            var validacionMinutos = hora1AF - HoraEvento
                            if (validacionMinutos >= 15 && validacionMinutos < 30){
                                setInterval(function(){                                     
                                    element.addClass("parpadea")
                                    //element.fadeOut(900).delay(300).fadeIn(800);
                                },2000); 
                            } else if(validacionMinutos > 30){
                                setInterval(function(){                                     
                                    element.addClass("parpadea2")
                                    
                                },2000);                                
                            }else {
                                
                            }                            
                        }
                    }                   
                  }catch(error){
                    
                  }
                },
            eventClick: function(calEvent,jsEvent,view){
                var date = new Date()
                var today = date.getDate()                   
                $('#input_id').val(calEvent.id)
                $('#input_color').val(calEvent.color)
                $('#tituloEvento').html(calEvent.servicio)
                $('#input_paciente').val(calEvent.title)                  
                $('#input_doctor').val(calEvent.doctor)                   
                $('#input_doctor_asignado').val(calEvent.doctor_asignado)                  
                $('#input_enfermera').val(calEvent.enfermera)                  
                $('#input_status').val(calEvent.estatus)
                $('#input_rs').val(calEvent.razon_social)
                var status = calEvent.estatus
                $('#input_servicio').val(calEvent.servicio)                   
                $('#input_cubiculo').val(calEvent.cubiculo)
                FechaHora = calEvent.start._i.split(" ")
                FechaHoraFin = calEvent.end._i.split(" ")
                $('#input_fecha').val(FechaHora[0])                
                $('#input_horaini').val(FechaHora[1])                  
                $('#input_horafin').val(FechaHoraFin[1])                   
                $("#ModalEventos").modal()
                var today1 = FechaHora[0] 
                var todaySplit = today1.split("-")
                var todayArray = todaySplit[2]
                
                if(today == todayArray) {
                    console.log(status)                          
                    if($('#input_status').val() == 'Generado'){
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#57cbc0;border:1px solid #57cbc0;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;")                           
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",false)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false)                           
                    } else if($('#input_status').val() == 'Confirmado') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#0c6f0f;border:1px solid #0c6f0f;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",false)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    }else if($('#input_status').val() == 'Espera') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    } else if($('#input_status').val() == 'Consulta') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    } else if($('#input_status').val() == 'Terminada') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    }
                }else{
                    console.log(status)
                    if($('#input_status').val() == 'Generado'){
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#57cbc0;border:1px solid #57cbc0;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",false)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    } else if($('#input_status').val() == 'Confirmado') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    }else if($('#input_status').val() == 'Espera') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    } else if($('#input_status').val() == 'Consulta') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    } else if($('#input_status').val() == 'Terminada') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    }
                }
                
            },
            editable:true,
            eventDrop: function(calEvent,delta,revertFunc){
                months = ["01","02","03","04","05","06","07","08","09","10","11","12"]                   
                var FechaDia = calEvent.start.format().split("T")
                var FechaDiaA = FechaDia[0]
                   //var dia = FechaDiaA[2]
                   //console.log(FechaDiaA)
                var date = new Date()
                var year = date.getFullYear()
                var month = months[date.getMonth()]
                var day = date.getDate()
                if (day < 10){
                    var day = "0"+day
                }
                
                var fecha = year.toString()+"-"+month.toString()+"-"+day.toString()
                
                   //console.log(fecha)
                if(FechaDiaA < fecha){
                    alert("ERROR! No puedes mover citas en días anteriores")
                    revertFunc()
                }else{
                    $('#input_id').val(calEvent.id);
                    $('#input_color').val(calEvent.color);
                    $('#tituloEvento').html(calEvent.servicio);
                    $('#input_paciente').val(calEvent.title);                   
                    $('#input_doctor').val(calEvent.doctor);                   
                    $('#input_doctor_asignado').val(calEvent.doctor_asignado);                   
                    $('#input_enfermera').val(calEvent.enfermera);                   
                    $('#input_status').val(calEvent.estatus)                  
                    $('#input_servicio').val(calEvent.servicio)                  
                    $('#input_cubiculo').val(calEvent.cubiculo)                   
                    var FechaHora = calEvent.start.format().split("T")                  
                    $('#input_fecha').val(FechaHora[0]);                   
                    $('#input_horaini').val(FechaHora[1]);                                      
                    var FechaHoraFin = calEvent.end.format().split("T");                   
                    $('#input_horafin').val(FechaHoraFin[1]);                   
                    RecolectarDatosGUI();
                    EnviarInformacion('modificar',NuevoEvento,true);
                }         
            }
        });
        
        /*Calendario con citas en terminado*/
        
        $('#calendario_t').fullCalendar({               
            header:{
                left:'prev,today,next',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },              
            dayClick:function(date,jsEvent,view){
                months = ["01","02","03","04","05","06","07","08","09","10","11","12"]                   
                var datClk = date.format()
                var fecha = new Date();
                var año = fecha.getFullYear()
                var mes = months[fecha.getMonth()]
                var dia = fecha.getDate()
                var fecha1 = año+"-"+mes+"-"+dia           
                   //var fechaSplit = fecha.split("T")
                if(new Date(datClk)< new Date(fecha1)){
                    document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    $("#generarIngreso").prop("disabled",true)
                    $("#insertarCita").prop("disabled",true)
                    $("#modificarCita").prop("disabled",true)
                    $("#borrarCita").prop("disabled",true)
                    $("#confirmarCita").prop("disabled",true)
                    limpiarFormulario()
                    $('#input_fecha').val(date.format())
                    var d = new Date()
                    var hI = d.getHours()+1
                    var hF = d.getHours()+2
                    var mI = '00';                                         
                    $("#input_horaini").val(hI+':'+mI)                       
                    $("#input_horafin").val(hF+':'+mI)           
                    $("#ModalEventos").modal()
                }else{
                    document.getElementById("insertarCita").setAttribute("style","background:#ef8cf9;border:1px solid #ef8cf9;")
                    document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                    $("#insertarCita").prop("disabled",false)
                    $("#confirmarCita").prop("disabled",true)
                    $("#generarIngreso").prop("disabled",true)                       
                    $("#modificarCita").prop("disabled",true)
                    $("#borrarCita").prop("disabled",true)                       
                    limpiarFormulario()
                    $('#input_fecha').val(date.format())
                    var d = new Date()
                    var hI = d.getHours()+1
                    var hF = d.getHours()+2
                    var mI = '00';                                         
                    $("#input_horaini").val(hI+':'+mI)                       
                    $("#input_horafin").val(hF+':'+mI)           
                    $("#ModalEventos").modal()
                }                  
            },
            events:'/clinica/eventos_terminado.php',
            timeFormat: 'HH:mm',
            eventRender: function(event, element) {
                var s = "";
                try{
                var eventDate = new Date(event.start._i.split(" ")[0] + " " +event.tiempo_espera); 
                var even = new Date(event.start._i)
                   //eventFechaHora = event.start._i.split(" ")
                   
                    eventFechaH = event.start._i.split(" ")[0] + " " +event.tiempo_espera
                    eventFechaHora = eventFechaH.split(" ")
                   
                    /*for(var t = 0; t < event.start; t++){
                      if(t == 2){
                        s += event.start[t] + " "
                      }else if(t >= 3 && t < 6){
                        s += event.start[t] + ":"
                      }else if(t == 6){
                        s += event.start[t]
                      }else{
                        s += event.start[t] + "-"
                      }
                    }
                    eventFechaHora = s.split(" ")*/
                   
                   var ArrEvFeHo = eventFechaHora[1]
                   var ArrEvFeHoMi = ArrEvFeHo.split(":")
                   var HoraEvento = ArrEvFeHoMi[0]+ArrEvFeHoMi[1]
                    if(todaysDate.formatMMDDYYYY() <= eventDate.formatMMDDYYYY() && todaysDate.formatMMDDYYYY() == eventDate.formatMMDDYYYY()) {
                        var status = event.estatus;
                         
                                               
                        if (status == 'Espera'){                            
                            /*Hora actual*/
                            var today = new Date()
                            var todayHours = today.getHours()
                            var todayMinutes = today.getMinutes()
                            
                            if (todayMinutes < 10) {
                                
                            }
                            var hora1 = parseInt(todayHours)+":"+parseInt(todayMinutes)
                            var hora1A = hora1.split(":")
                            if(hora1A[1] < 10){
                                var minhora1A = "0"+hora1A[1]
                            }else{
                                var minhora1A = hora1A[1]
                            }
                            var hora1AF = hora1A[0]+minhora1A
                            
                            var validacionMinutos = hora1AF - HoraEvento
                            if (validacionMinutos >= 15 && validacionMinutos < 30){
                                setInterval(function(){                                     
                                    element.addClass("parpadea")
                                    //element.fadeOut(900).delay(300).fadeIn(800);
                                },2000); 
                            } else if(validacionMinutos > 30){
                                setInterval(function(){                                     
                                    element.addClass("parpadea2")
                                    
                                },2000);                                
                            }else {
                                
                            }                            
                        }
                    }                   
                  }catch(error){
                    
                  }
                },
            eventClick: function(calEvent,jsEvent,view){
                var date = new Date()
                var today = date.getDate()                   
                $('#input_id').val(calEvent.id)
                $('#input_color').val(calEvent.color)
                $('#tituloEvento').html(calEvent.servicio)
                $('#input_paciente').val(calEvent.title)                  
                $('#input_doctor').val(calEvent.doctor)                   
                $('#input_doctor_asignado').val(calEvent.doctor_asignado)                  
                $('#input_enfermera').val(calEvent.enfermera)                  
                $('#input_status').val(calEvent.estatus)
                $('#input_rs').val(calEvent.razon_social)
                var status = calEvent.estatus
                $('#input_servicio').val(calEvent.servicio)                   
                $('#input_cubiculo').val(calEvent.cubiculo)
                FechaHora = calEvent.start._i.split(" ")
                FechaHoraFin = calEvent.end._i.split(" ")
                $('#input_fecha').val(FechaHora[0])                
                $('#input_horaini').val(FechaHora[1])                  
                $('#input_horafin').val(FechaHoraFin[1])                   
                $("#ModalEventos").modal()
                var today1 = FechaHora[0] 
                var todaySplit = today1.split("-")
                var todayArray = todaySplit[2]
                
                if(today == todayArray) {
                    console.log(status)                          
                    if($('#input_status').val() == 'Generado'){
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#57cbc0;border:1px solid #57cbc0;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;")                           
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",false)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false)                           
                    } else if($('#input_status').val() == 'Confirmado') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#0c6f0f;border:1px solid #0c6f0f;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",false)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    }else if($('#input_status').val() == 'Espera') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    } else if($('#input_status').val() == 'Consulta') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    } else if($('#input_status').val() == 'Terminada') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    }
                }else{
                    console.log(status)
                    if($('#input_status').val() == 'Generado'){
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#57cbc0;border:1px solid #57cbc0;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",false)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    } else if($('#input_status').val() == 'Confirmado') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#2F5491;border:1px solid #2F5491;")
                        document.getElementById("borrarCita").setAttribute("style","background:#ffa833;border:1px solid #ffa833;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",false)
                        $("#borrarCita").prop("disabled",false) 
                    }else if($('#input_status').val() == 'Espera') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    } else if($('#input_status').val() == 'Consulta') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    } else if($('#input_status').val() == 'Terminada') {
                        document.getElementById("insertarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("confirmarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("generarIngreso").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("modificarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;")
                        document.getElementById("borrarCita").setAttribute("style","background:#9c9a9a;border:1px solid #9c9a9a;") 
                        $("#generarIngreso").prop("disabled",true)
                        $("#confirmarCita").prop("disabled",true)
                        $("#insertarCita").prop("disabled",true)
                        $("#modificarCita").prop("disabled",true)
                        $("#borrarCita").prop("disabled",true) 
                    }
                }
                
            },
            editable:true,
            eventDrop: function(calEvent,delta,revertFunc){
                months = ["01","02","03","04","05","06","07","08","09","10","11","12"]                   
                var FechaDia = calEvent.start.format().split("T")
                var FechaDiaA = FechaDia[0]
                   //var dia = FechaDiaA[2]
                   //console.log(FechaDiaA)
                var date = new Date()
                var year = date.getFullYear()
                var month = months[date.getMonth()]
                var day = date.getDate()
                if (day < 10){
                    var day = "0"+day
                }
                
                var fecha = year.toString()+"-"+month.toString()+"-"+day.toString()
                
                   //console.log(fecha)
                if(FechaDiaA < fecha){
                    alert("ERROR! No puedes mover citas en días anteriores")
                    revertFunc()
                }else{
                    $('#input_id').val(calEvent.id);
                    $('#input_color').val(calEvent.color);
                    $('#tituloEvento').html(calEvent.servicio);
                    $('#input_paciente').val(calEvent.title);                   
                    $('#input_doctor').val(calEvent.doctor);                   
                    $('#input_doctor_asignado').val(calEvent.doctor_asignado);                   
                    $('#input_enfermera').val(calEvent.enfermera);                   
                    $('#input_status').val(calEvent.estatus)                  
                    $('#input_servicio').val(calEvent.servicio)                  
                    $('#input_cubiculo').val(calEvent.cubiculo)                   
                    var FechaHora = calEvent.start.format().split("T")                  
                    $('#input_fecha').val(FechaHora[0]);                   
                    $('#input_horaini').val(FechaHora[1]);                                      
                    var FechaHoraFin = calEvent.end.format().split("T");                   
                    $('#input_horafin').val(FechaHoraFin[1]);                   
                    RecolectarDatosGUI();
                    EnviarInformacion('modificar',NuevoEvento,true);
                }         
            }
        });           
    });        
	</script>
	
	<!--Modal para insetar citas-->
	<div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="tituloEvento">Inserta Cita</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div id="descripcionEvento"></div>
	      </div>
          <div class="form-row" style="flex-direction: row-reverse;">
              <div class="col-2">                    
                <input type="text" name="paciente" value="" class="form-control form-control-sm float-right" placeholder="folio" id="input_id" disabled>
              </div>
              <h5>Folio:</h5>              
              <div class="form-group col-md-6">
                    <input type="hidden" name="color" value="" class="form-control" placeholder="color" id="input_color">
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col-md-12">
                    <span>Paciente: </span>
                    <select class="form-control" name="pacientes" id="input_paciente" required>
                        <?php
                            if($gestor_db == true) {
                                $sql = "SELECT DISTINCT(NOMBRE) AS NOMBRE FROM CONTAC01 ORDER BY NOMBRE ASC";
                                $gestor_sent = ibase_query($gestor_db, $sql);
                                $coln = ibase_num_fields($gestor_sent);
                            while($t = ibase_fetch_object($gestor_sent)){
                                $nombre = $t->NOMBRE;
                                echo "<option name='$nombre'>$nombre</option>";
                            }
                            }
                        ?>
                    </select>                    
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col-md-12">
                    <span>Razón Social: </span>
                    <input class="form-control" name="razon_social" id="input_rs" disabled>                   
              </div>
          </div>
                       
              <div class="form-row">
                  <div class="form-group col-md-12">
                        <span>Doctor titular: </span>                        
                            <?php
                                if ($mysqli->connect_errno) {
                                    printf("Falló la conexión: %s\n", $mysqli->connect_error);
                                    exit();
                                }else{  
                                echo "<select class='form-control' name='pacientes' id='input_doctor'>";
                                foreach($mysqli->query('SELECT nombre FROM usuarios WHERE tipo = "D" ORDER BY nombre ASC') as $row) {
                                  echo "<option>". $row[nombre]."</option>";
                                }
                                echo "</select>";
                                }                                
                            ?>
                        </select>                        
                  </div>                                
              </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                        <span>Doctor asignado: </span>
                        <?php
                            if ($mysqli->connect_errno) {
                                printf("Falló la conexión: %s\n", $mysqli->connect_error);
                                exit();
                            }else{  
                            echo '<select class="form-control" name="pacientes" id="input_doctor_asignado">';
                            foreach($mysqli->query('SELECT nombre FROM usuarios WHERE tipo = "D" ORDER BY nombre ASC') as $row) {
                              echo "<option>". $row[nombre]."</option>";
                            }
                            echo "</select>";
                            }                                
                        ?>                       
                  </div>
                  <div class="form-group col-md-6">
                        <span>Enfermera: </span>
                        <?php
                            if ($mysqli->connect_errno) {
                                printf("Falló la conexión: %s\n", $mysqli->connect_error);
                                exit();
                            }else{  
                            echo '<select class="form-control" name="pacientes" id="input_enfermera">';
                            foreach($mysqli->query('SELECT nombre FROM usuarios WHERE tipo = "E" ORDER BY nombre ASC') as $row) {
                              echo "<option>". $row[nombre]."</option>";
                            }
                            echo "</select>";
                            }                                
                        ?>                        
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <input type="hidden" name="status" value="" class="form-control hide" placeholder="Paciente" id="input_status">                                          
                  </div>
              </div>         
          <div class="form-row">
              <div class="form-group col-md-12">
                    <span>Servicio: </span>
                    <select class="form-control" name="servicio" id="input_servicio">
                        <?php
                          if($gestor_db == true) {
                              $sql = "SELECT DESCR FROM INVE01 WHERE TIPO_ELE = 'S'";
                              $gestor_sent = ibase_query($gestor_db, $sql);
                              $coln = ibase_num_fields($gestor_sent);
                              while ($t = ibase_fetch_object($gestor_sent)){
                                  $descr = $t-> DESCR;
                                  echo "<option>$descr</option>";
                              }
                          }
                        ?>
                    </select>
              </div>             
          </div>
          <div class="form-row">
              <div class="form-group col-md-12">
                    <span>Cubículo: </span>
                    <select class="form-control" name="cubiculo" id="input_cubiculo">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                    </select>
              </div>             
          </div>          
          <div class="form-row">
              <div class="form-group col-md-6">
                    <span>Hora inicial: </span>
                    <div class="input-group clockpicker" data-autoclose="true">
                        <input type="text" name="ini" class="form-control" id="input_horaini">
                    </div>
              </div>
              <div class="form-group col-md-6">
                    <span>Hora final: </span>
                    <div class="input-group clockpicker" data-autoclose="true">
                        <input type="text" name="fin" class="form-control"  id="input_horafin">
                    </div>
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col-md-12">
                    <span>Fecha: </span><input type="date" name="Fecha" value="" class="form-control" placeholder="Fecha" id="input_fecha">
              </div>             
          </div>
          <div class="modal-footer">
              <div class="form-row">
                  <div class="form-group col-md-12">
                    <button type="button" class="btn citado" id="insertarCita">Generar Cita</button>	        
                    <button type="button" class="btn" id="confirmarCita">Confirmar CIta</button>	        
                    <button type="button" class="btn btn-successA" id="generarIngreso">En Espera</button>              
                  </div>                  
                  <div class="form-group col-md-12">
                     <button type="button" class="btn btn-primary" id="modificarCita">Modificar Cita</button>	        
	                 <button type="button" class="btn btn-warning" id="borrarCita">Borrar Cita</button>	        
	                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button> 
                  </div>              
              </div>             	                
	      </div>
	    </div>
	  </div>
	</div>
	<script>
        var NuevoEvento;
        $("#insertarCita").click(function(){ 
            var date = new Date();
            months = ["01","02","03","04","05","06","07","08","09","10","11","12"]
            var horaIni = $("#input_horaini").val()
            var horaFin = $("#input_horafin").val()
            var paciente = $("#input_paciente").val()
            var doctorTitular = $("#input_doctor").val()
            var doctorAsignado = $("#input_doctor_asignado").val()
            var enfermera = $("#input_enfermera").val()
            var servicio = $("#input_servicio").val()
            var cubiculo = $("#input_cubiculo").val()
            var hri = horaIni.replace(":","")
            var hrf = horaFin.replace(":","")
            var horaActual = date.getHours()
            var minActual = date.getMinutes()            
            var dia = date.getDate()
            var mes = months[date.getMonth()]
            var año = date.getFullYear()
            if (dia < 10) {
                var dia = "0"+date.getDate()()
            }
            if(horaActual < 10){
                var horaActual = "0"+horaActual
                //var horaActualA = parseInt(horaActual)
            }else{
                var horaActual
            }
            var HoraMin = horaActual+":"+(minActual)           
            var HoraMinA = HoraMin.replace(":","") 
            
            var inputDia = $("#input_fecha").val().split("-")
            //console.log(inputDia)
            if (dia < inputDia[2]){
                if(hri > hrf){
                    alert("Hora incorrecta")
                }else{
                    RecolectarDatosGUI();
                    EnviarInformacion('agregar',NuevoEvento);                
                }                
                
            } else if (dia == inputDia[2]){
                if ((hri > hrf)||(hri < HoraMinA)){
                    alert("hora incorrecta")
                }else {
                    RecolectarDatosGUI();
                    EnviarInformacion('agregar',NuevoEvento);
                }
                    
            }  
        });
        $("#borrarCita").click(function(){ 
            RecolectarDatosGUI();
            EnviarInformacion('eliminar',NuevoEvento);
        });
        $("#modificarCita").click(function(){ 
            months = ["01","02","03","04","05","06","07","08","09","10","11","12"]
            var fecha = new Date();
            var año = fecha.getFullYear()
            var mes = months[fecha.getMonth()]
            var dia = fecha.getDate()
            var horaIni = $("#input_horaini").val()
            var horaFin = $("#input_horafin").val()
            var hri = horaIni.replace(":","")
            var hrf = horaFin.replace(":","")
            var hriA = hri.split(":")
            var hrfA = hrf.split(":")
            var horaActual = fecha.getHours()
            var minActual = fecha.getMinutes()            
            
            if(horaActual < 10){
                var horaActual = "0"+horaActual
                //var horaActualA = parseInt(horaActual)
            }else{
                var horaActual
            }
            if(minActual < 10){
                var minActual = "0"+minActual
            }else{
                var minActual
            }
            var HoraMin = horaActual+":"+(minActual)           
            var HoraMinA = HoraMin.replace(":","") 
            
            if (dia < 10) {
                var dia = "0"+fecha.getDate()
            }
            var today = año+"-"+mes+"-"+dia
            var otherDay = $("#input_fecha").val()            
            
            if (otherDay > today){
                if(hriA[0] > hrfA[0]){
                    alert("Hora incorrecta")
                }else{
                    console.log(hriA[0])
                    console.log(hrfA[0])
                    RecolectarDatosGUI();
                    EnviarInformacion('modificar',NuevoEvento);                                   
                }
                
            }else if(hriA[0] > hrfA[0]){
                                
                alert("hora incorrecta")  
            }else if (otherDay = today) {
                if(hriA[0] > hrfA[0]){
                    alert("hora incorrecta")  
                }else if(hriA[0] < HoraMinA){
                    //console.log(hriA[0]+"---"+HoraMinA)
                    alert("hora incorrecta")  
                }else{
                    //console.log("here")
                    RecolectarDatosGUI();
                    EnviarInformacion('modificar',NuevoEvento);
                }        
            }
        });
        $("#generarIngreso").click(function(){ 
           var date = new Date()
            if(date.getHours() < 10){
              $.post("/clinica/php/cronometro.php",{"hora": "0" + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds(),id_cita: $("#input_id").val()}).done(function(data){
              
            });
            }else{
              $.post("/clinica/php/cronometro.php",{"hora": date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds(),id_cita: $("#input_id").val()}).done(function(data){
              
            });
            }


            RecolectarDatosGUI();
            EnviarInformacion('ingresar',NuevoEvento);
            //location.reload();
        });
        $("#confirmarCita").click(function(){
            RecolectarDatosGUI();
            EnviarInformacion('confirmar',NuevoEvento);
        })
        $("#input_paciente").on('change',function(){
          $.post("php/consult_rs.php",{
            "nombre": $("#input_paciente").val()
          }).done(function(data){
            $("#input_rs").val(JSON.parse(data))
          })
        })
        function RecolectarDatosGUI(){
            var date = new Date();
            months = ["01","02","03","04","05","06","07","08","09","10","11","12"]
            if($("#input_paciente").val() == null){
              alert("Ningún paciente seleccionado")
            }else if($("#input_doctor").val() == null){
              alert("Ningún doctor seleccionado")
            }else if($("#input_enfermera").val() == null){
              alert("Ninguna enfermera seleccionada")
            }else if($("#input_servicio").val() == null){
              alert("El servicio está vacío")
            }else if($("#input_cubiculo").val() == 0 || $("#input_cubiculo").val() == null){
              alert("Ningún cubículo seleccionado")
            }else{
            NuevoEvento = {
                id: $("#input_id").val(),
                title: $("#input_paciente").val(),
                color: $("#input_color").val(),
                razon_social: "testing",
                doctor: $("#input_doctor").val(),
                doctor_asignado: $("#input_doctor_asignado").val(),
                enfermera: $("#input_enfermera").val(),
                start: $("#input_fecha").val()+" "+$("#input_horaini").val(), 
                end: $("#input_fecha").val()+" "+$("#input_horafin").val(),                
                estatus: $("#input_status").val(),
                servicio: $("#input_servicio").val(),
                cubiculo: $("#input_cubiculo").val(),
                date: date.getFullYear()+"-"+months[date.getMonth()]+"-"+date.getDate() + " "+date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds()                
            };
          }
        }
        function EnviarInformacion(accion,objEvento,modal){
            $.ajax({
                type: 'POST',
                url: 'eventos.php?accion='+accion,
                data: objEvento,
                success: function(msg){
                    if(msg){
                        $("#calendario").fullCalendar('refetchEvents');
                        $("#calendario_e").fullCalendar('refetchEvents');
                        $("#calendario_g").fullCalendar('refetchEvents');
                        $("#calendario_cf").fullCalendar('refetchEvents');
                        $("#calendario_c").fullCalendar('refetchEvents');
                        $("#calendario_t").fullCalendar('refetchEvents');
                        if(!modal){
                            $("#ModalEventos").modal('toggle');
                           }                        
                    }
                },
                error: function(){
                    alert("error");
                }
            });
        }
        $('.clockpicker').clockpicker({
            placement: 'top',            
            donetext: 'Done'
        });
        function limpiarFormulario(){
            $('#input_rs').val('');
            $('#input_id').val('');
            $('#tituloEvento').html('');
            $('#input_color').val('');
            $('#input_paciente').val('');                   
            $('#input_doctor').val('');                   
            $('#input_doctor_asignado').val('');                   
            $('#input_enfermera').val('');                   
            $('#input_status').val('');                   
            $('#input_servicio').val('');                   
            $('#input_cubiculo').val('');
            $('#input_fecha').val('');                   
            $('#input_horaini').val('');                   
            $('#input_horafin').val('');
        }
        setTimeout('document.location.reload()',600000);
    </script>
</body>
</html>