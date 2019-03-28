<?php
    require 'php/conexionSAE.php';
    require 'php/conexion.php';
    session_start();
    $usuario = $_SESSION['usuario']['nombre_usuario'];
    $tipo = $_SESSION['usuario']['tipo'];
    if($tipo != 'D'){
        header('location: php/logout.php');
    };

?>
<!DOCTYPE html>
<html>
<head>	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>DERMA-DF</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	<script src="js/bootstrap-clockpicker.js"></script>
</head>
<body>   
<header>
  <img src="img/cintillo-medicos.png" class="img-fluid">
  <div id="nav" class="container-fluid">
    <ul class="nav nav-ul">
        <li class="nav-item">
            <img src="img/medicos_icono.png">
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
                  right: 'agendaWeek, agendaDay'
              },
              minTime:'09:00:00',
              maxTime:'22:00:00',
              /*dayClick:function(date,jsEvent,view){
                  $("#generarIngreso").prop("disabled",true);
                  $("#insertarCita").prop("disabled",false);
                  $("#modificarCita").prop("disabled",true);
                  $("#borrarCita").prop("disabled",true);
                  limpiarFormulario();
                  $('#input_fecha').val(date.format());
                  $("#ModalEventos").modal();                   
              },*/
              events:'/clinica/eventos_doctor.php',
              eventClick: function(calEvent,jsEvent,view){
                
                  var paciente = calEvent.title.split("--"); 
                  var status = calEvent.estatus;
                  $("#generarIngreso").prop("disabled",false);
                  $("#insertarCita").prop("disabled",true);
                  $("#modificarCita").prop("disabled",false);
                  $("#borrarCita").prop("disabled",false);
                  $('#input_id').val(calEvent.id);
                  $('#input_rs').val(calEvent.razon_social);
                  $('#tituloEvento').html(calEvent.servicio);
                  $('#input_paciente').val(paciente[0]);                   
                  $('#input_doctor').val(calEvent.doctor);                   
                  $('#input_doctor_asignado').val(calEvent.doctor_asignado);                   
                  $('#input_enfermera').val(calEvent.enfermera);                   
                  $('#input_status').val(calEvent.estatus);                   
                  $('#input_servicio').val(calEvent.servicio);                   
                  $('#input_cubiculo').val(calEvent.cubiculo); 
                  FechaHora = calEvent.start._i.split(" ");
                  FechaHoraFin = calEvent.end._i.split(" ");
                  $('#input_fecha').val(FechaHora[0]);                   
                  $('#input_horaini').val(FechaHora[1]);                   
                  $('#input_horafin').val(FechaHoraFin[1]);                   
                  $("#ModalEventos").modal();
                  console.log(status);
                  var id = $('#input_id').val();
                    var tbody = document.getElementById("tbody_t")
                    var paciente = $('#input_paciente').val();
                    var servicio = $('#input_servicio').val();
                    //EnviarInformacion('modificar',NuevoEvento);
                    var tr_prodt = document.createElement("TR");
                    var td_prodt = document.createElement("TD");
                    td_prodt.setAttribute("class","tdprodt");
                    td_prodt.innerHTML = id;
                    var prod_tab = document.getElementById("products_table");
                    tr_prodt.appendChild(td_prodt);
                    prod_tab.appendChild(tr_prodt);
                    $("#products_table").show();
                    document.getElementById("tbody_t").innerHTML = ""
                    $.post("/clinica/php/consult_mat.php",{"paciente":paciente,"id":id}).done(function(data){

                      for(var i = 0; i<JSON.parse(data).length;i++){
                        var tr = document.createElement("TR")
                        for(var j = 0; j<JSON.parse(data)[i].length;j++){
                          var td = document.createElement("TD")
                          if(j == 6){
                            td.id = "subtotal"
                            td.innerHTML = "$" +JSON.parse(data)[i][j].toString() + ".00"
                          }else{
                            if(JSON.parse(data)[i][j] === ""){

                              td.innerHTML = "<input class='observ'>"
                              td.id = "td_input_obs"
                            }else{
                              td.innerHTML = JSON.parse(data)[i][j]
                            }


                          }
                          tr.appendChild(td)
                        }
                        var button = document.createElement("BUTTON")
                        button.innerHTML = "Borrar"
                        button.id = "button_borrar"
                        button.setAttribute("class","button_borrar btn btn-primary")
                        button.setAttribute("type","button")
                        tr.appendChild(button)
                        tbody.append(tr)
                      }
                      if(status == "Terminada"){
                        $(".button_borrar").prop("disabled",true)
                      }
                      var td_total = document.createElement("TD");
                      var tr_total = document.createElement("TR")
                      tbody.append(tr_total)
                      var total = 0;
                      tr_total.id = "tr_total"
                      tr_total.appendChild(td_total);
                            //table.appendChild(tr)
                            //table.appendChild(tr_total);
                    [].forEach.call(document.querySelectorAll("#products_table > tbody > tr > td"), function(td){
                                if(td.id == "subtotal"){
                                    total += parseFloat(td.innerHTML.split("$")[1]);
                                  }
                            });
                            td_total.innerHTML = "Total " + "$"+total.toString();
                    })
                  
                  if($('#input_status').val() == 'Espera'){
                      $("#products_table").hide()
                      $("#button_materiales").prop("disabled",true)                   
                      $("#modificarCita").prop("disabled",false)
                      $("#modificarCita").html("Iniciar Consulta")
                      $("#modificar_cita").prop("disabled",true)
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)
                  }else if($('#input_status').val() == 'Consulta'){
                      $("#products_table").show()
                      $("#button_materiales").prop("disabled",false)                   
                      $("#modificarCita").prop("disabled",false)
                      $("#modificar_cita").prop("disabled",false)
                      $("#modificarCita").html("Continuar Consulta")
                      $("#envia_modelo").prop("disabled",false)
                      $("#TerminarCita").prop("disabled",false)
                  }else if($('#input_status').val() == 'Generado'){
                      $("#products_table").hide()
                      $("#button_materiales").prop("disabled",true)             
                      $("#modificarCita").prop("disabled",true)
                      $("#modificar_cita").prop("disabled",true)
                      $("#modificarCita").html("Iniciar Consulta")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)
                  }else if($('#input_status').val() == 'Confirmado'){
                      $("#products_table").hide()
                      $("#button_materiales").prop("disabled",true)              
                      $("#modificarCita").prop("disabled",true)
                      $("#modificarCita").html("Iniciar Consulta")
                      $("#modificar_cita").prop("disabled",true)
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)  
                  }else if($('#input_status').val() == 'Terminada'){
                      $("#products_table").show()  
                      $("#button_materiales").prop("disabled",true)              
                      $("#modificarCita").prop("disabled",true)
                      $("#modificar_cita").prop("disabled",true)
                      $("#modificarCita").html("Finalizada")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)

                  }
              },               
              eventDrop: function(calEvent){
                  $('#input_id').val(calEvent.id);
                  $('#input_color').val(calEvent.color);
                  $('#tituloEvento').html(calEvent.servicio);
                  $('#input_paciente').val(calEvent.title);                   
                  $('#input_doctor').val(calEvent.doctor);                   
                  $('#input_doctor_asignado').val(calEvent.doctor_asignado);                   
                  $('#input_enfermera').val(calEvent.enfermera);                   
                  $('#input_status').val(calEvent.estatus);                   
                  $('#input_servicio').val(calEvent.servicio);                   
                  $('#input_cubiculo').val(calEvent.cubiculo);
                  
                  var FechaHora = calEvent.start.format().split("T");            
                  
                  $('#input_fecha').val(FechaHora[0]);                   
                  $('#input_horaini').val(FechaHora[1]);
                  
                  var FechaHoraFin = calEvent.end.format().split("T");
                  
                  
                  RecolectarDatosGUI();
                  EnviarInformacion('modificar',NuevoEvento,true);                                     
              },
              defaultView: 'agendaDay'
          });
          
          $('#calendario_e').fullCalendar({
                header:{
                    left:'prev,today,next',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay'
                },               
                minTime:'09:00:00',
                maxTime:'22:00:00',
                /*dayClick:function(date,jsEvent,view){
                    $("#generarIngreso").prop("disabled",true);
                    $("#insertarCita").prop("disabled",false);
                    $("#modificarCita").prop("disabled",true);
                    $("#borrarCita").prop("disabled",true);
                    limpiarFormulario();
                    $('#input_fecha').val(date.format());
                    $("#ModalEventos").modal();                   
                },*/
                events:'/clinica/php/eventos_doctor/eventos_doctor_espera.php',
                eventClick: function(calEvent,jsEvent,view){
                
                  var paciente = calEvent.title.split("--"); 
                  var status = calEvent.estatus;
                  $("#generarIngreso").prop("disabled",false);
                  $("#insertarCita").prop("disabled",true);
                  $("#modificarCita").prop("disabled",false);
                  $("#borrarCita").prop("disabled",false);
                  $('#input_id').val(calEvent.id);
                  $('#input_rs').val(calEvent.razon_social);
                  $('#tituloEvento').html(calEvent.servicio);
                  $('#input_paciente').val(paciente[0]);                   
                  $('#input_doctor').val(calEvent.doctor);                   
                  $('#input_doctor_asignado').val(calEvent.doctor_asignado);                   
                  $('#input_enfermera').val(calEvent.enfermera);                   
                  $('#input_status').val(calEvent.estatus);                   
                  $('#input_servicio').val(calEvent.servicio);                   
                  $('#input_cubiculo').val(calEvent.cubiculo); 
                  FechaHora = calEvent.start._i.split(" ");
                  FechaHoraFin = calEvent.end._i.split(" ");
                  $('#input_fecha').val(FechaHora[0]);                   
                  $('#input_horaini').val(FechaHora[1]);                   
                  $('#input_horafin').val(FechaHoraFin[1]);                   
                  $("#ModalEventos").modal();
                  console.log(status);
                  var id = $('#input_id').val();
                    var tbody = document.getElementById("tbody_t")
                    var paciente = $('#input_paciente').val();
                    var servicio = $('#input_servicio').val();
                    //EnviarInformacion('modificar',NuevoEvento);
                    var tr_prodt = document.createElement("TR");
                    var td_prodt = document.createElement("TD");
                    td_prodt.setAttribute("class","tdprodt");
                    td_prodt.innerHTML = id;
                    var prod_tab = document.getElementById("products_table");
                    tr_prodt.appendChild(td_prodt);
                    prod_tab.appendChild(tr_prodt);
                    $("#products_table").show();
                    document.getElementById("tbody_t").innerHTML = ""
                    $.post("/clinica/php/consult_mat.php",{"paciente":paciente,"id":id}).done(function(data){

                      for(var i = 0; i<JSON.parse(data).length;i++){
                        var tr = document.createElement("TR")
                        for(var j = 0; j<JSON.parse(data)[i].length;j++){
                          var td = document.createElement("TD")
                          if(j == 6){
                            td.id = "subtotal"
                            td.innerHTML = "$" +JSON.parse(data)[i][j].toString() + ".00"
                          }else{
                            if(JSON.parse(data)[i][j] === ""){

                              td.innerHTML = "<input class='observ'>"
                              td.id = "td_input_obs"
                            }else{
                              td.innerHTML = JSON.parse(data)[i][j]
                            }


                          }
                          tr.appendChild(td)
                        }
                        var button = document.createElement("BUTTON")
                        button.innerHTML = "Borrar"
                        button.id = "button_borrar"
                        button.setAttribute("class","button_borrar btn btn-primary")
                        button.setAttribute("type","button")
                        tr.appendChild(button)
                        tbody.append(tr)
                      }
                      if(status == "Terminada"){
                        $(".button_borrar").prop("disabled",true)
                      }
                      var td_total = document.createElement("TD");
                      var tr_total = document.createElement("TR")
                      tbody.append(tr_total)
                      var total = 0;
                      tr_total.id = "tr_total"
                      tr_total.appendChild(td_total);
                            //table.appendChild(tr)
                            //table.appendChild(tr_total);
                    [].forEach.call(document.querySelectorAll("#products_table > tbody > tr > td"), function(td){
                                if(td.id == "subtotal"){
                                    total += parseFloat(td.innerHTML.split("$")[1]);
                                  }
                            });
                            td_total.innerHTML = "Total " + "$"+total.toString();
                    })

                  if($('#input_status').val() == 'Espera'){
                      $("#products_table").hide()
                      $("#button_materiales").prop("disabled",true)                   
                      $("#modificarCita").prop("disabled",false)
                      $("#modificarCita").html("Iniciar Consulta")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)
                  }else if($('#input_status').val() == 'Consulta'){
                      $("#products_table").show()
                      $("#button_materiales").prop("disabled",false)                   
                      $("#modificarCita").prop("disabled",false)
                      $("#modificarCita").html("Continuar Consulta")
                      $("#envia_modelo").prop("disabled",false)
                      $("#TerminarCita").prop("disabled",false)
                  }else if($('#input_status').val() == 'Generado'){
                      $("#products_table").hide()
                      $("#button_materiales").prop("disabled",true)             
                      $("#modificarCita").prop("disabled",true)
                      $("#modificarCita").html("Iniciar Consulta")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)
                  }else if($('#input_status').val() == 'Confirmado'){
                      $("#products_table").hide()
                      $("#button_materiales").prop("disabled",true)              
                      $("#modificarCita").prop("disabled",true)
                      $("#modificarCita").html("Iniciar Consulta")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)  
                  }else if($('#input_status').val() == 'Terminada'){
                      $("#products_table").show()  
                      $("#button_materiales").prop("disabled",true)              
                      $("#modificarCita").prop("disabled",true)
                      $("#modificarCita").html("Finalizada")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)

                  }
              },               
              eventDrop: function(calEvent){
                  $('#input_id').val(calEvent.id);
                  $('#input_color').val(calEvent.color);
                  $('#tituloEvento').html(calEvent.servicio);
                  $('#input_paciente').val(calEvent.title);                   
                  $('#input_doctor').val(calEvent.doctor);                   
                  $('#input_doctor_asignado').val(calEvent.doctor_asignado);                   
                  $('#input_enfermera').val(calEvent.enfermera);                   
                  $('#input_status').val(calEvent.estatus);                   
                  $('#input_servicio').val(calEvent.servicio);                   
                  $('#input_cubiculo').val(calEvent.cubiculo);
                  
                  var FechaHora = calEvent.start.format().split("T");            
                  
                  $('#input_fecha').val(FechaHora[0]);                   
                  $('#input_horaini').val(FechaHora[1]);
                  
                  var FechaHoraFin = calEvent.end.format().split("T");
                  
                  
                  RecolectarDatosGUI();
                  EnviarInformacion('modificar',NuevoEvento,true);                                     
              },
              defaultView: 'month'
          });
          
          $('#calendario_g').fullCalendar({
              header:{
                  left:'prev,today,next',
                  center: 'title',
                  right: 'month, agendaWeek, agendaDay'
              },
               //contentHeight: '650',
              minTime:'09:00:00',
              maxTime:'22:00:00',
              /*dayClick:function(date,jsEvent,view){
                  $("#generarIngreso").prop("disabled",true);
                  $("#insertarCita").prop("disabled",false);
                  $("#modificarCita").prop("disabled",true);
                  $("#borrarCita").prop("disabled",true);
                  limpiarFormulario();
                  $('#input_fecha').val(date.format());
                  $("#ModalEventos").modal();                   
              },*/
              events:'/clinica/php/eventos_doctor/eventos_doctor_citado.php',
              eventClick: function(calEvent,jsEvent,view){
                
                  var paciente = calEvent.title.split("--"); 
                  var status = calEvent.estatus;
                  $("#generarIngreso").prop("disabled",false);
                  $("#insertarCita").prop("disabled",true);
                  $("#modificarCita").prop("disabled",false);
                  $("#borrarCita").prop("disabled",false);
                  $('#input_id').val(calEvent.id);
                  $('#input_rs').val(calEvent.razon_social);
                  $('#tituloEvento').html(calEvent.servicio);
                  $('#input_paciente').val(paciente[0]);                   
                  $('#input_doctor').val(calEvent.doctor);                   
                  $('#input_doctor_asignado').val(calEvent.doctor_asignado);                   
                  $('#input_enfermera').val(calEvent.enfermera);                   
                  $('#input_status').val(calEvent.estatus);                   
                  $('#input_servicio').val(calEvent.servicio);                   
                  $('#input_cubiculo').val(calEvent.cubiculo); 
                  FechaHora = calEvent.start._i.split(" ");
                  FechaHoraFin = calEvent.end._i.split(" ");
                  $('#input_fecha').val(FechaHora[0]);                   
                  $('#input_horaini').val(FechaHora[1]);                   
                  $('#input_horafin').val(FechaHoraFin[1]);                   
                  $("#ModalEventos").modal();
                  console.log(status);
                  var id = $('#input_id').val();
                    var tbody = document.getElementById("tbody_t")
                    var paciente = $('#input_paciente').val();
                    var servicio = $('#input_servicio').val();
                    //EnviarInformacion('modificar',NuevoEvento);
                    var tr_prodt = document.createElement("TR");
                    var td_prodt = document.createElement("TD");
                    td_prodt.setAttribute("class","tdprodt");
                    td_prodt.innerHTML = id;
                    var prod_tab = document.getElementById("products_table");
                    tr_prodt.appendChild(td_prodt);
                    prod_tab.appendChild(tr_prodt);
                    $("#products_table").show();
                    document.getElementById("tbody_t").innerHTML = ""
                    $.post("/clinica/php/consult_mat.php",{"paciente":paciente,"id":id}).done(function(data){

                      for(var i = 0; i<JSON.parse(data).length;i++){
                        var tr = document.createElement("TR")
                        for(var j = 0; j<JSON.parse(data)[i].length;j++){
                          var td = document.createElement("TD")
                          if(j == 6){
                            td.id = "subtotal"
                            td.innerHTML = "$" +JSON.parse(data)[i][j].toString() + ".00"
                          }else{
                            if(JSON.parse(data)[i][j] === ""){

                              td.innerHTML = "<input class='observ'>"
                              td.id = "td_input_obs"
                            }else{
                              td.innerHTML = JSON.parse(data)[i][j]
                            }


                          }
                          tr.appendChild(td)
                        }
                        var button = document.createElement("BUTTON")
                        button.innerHTML = "Borrar"
                        button.id = "button_borrar"
                        button.setAttribute("class","button_borrar btn btn-primary")
                        button.setAttribute("type","button")
                        tr.appendChild(button)
                        tbody.append(tr)
                      }
                      if(status == "Terminada"){
                        $(".button_borrar").prop("disabled",true)
                      }
                      var td_total = document.createElement("TD");
                      var tr_total = document.createElement("TR")
                      tbody.append(tr_total)
                      var total = 0;
                      tr_total.id = "tr_total"
                      tr_total.appendChild(td_total);
                            //table.appendChild(tr)
                            //table.appendChild(tr_total);
                    [].forEach.call(document.querySelectorAll("#products_table > tbody > tr > td"), function(td){
                                if(td.id == "subtotal"){
                                    total += parseFloat(td.innerHTML.split("$")[1]);
                                  }
                            });
                            td_total.innerHTML = "Total " + "$"+total.toString();
                    })
                  
                  if($('#input_status').val() == 'Espera'){
                      $("#products_table").hide()
                      $("#button_materiales").prop("disabled",true)                   
                      $("#modificarCita").prop("disabled",false)
                      $("#modificarCita").html("Iniciar Consulta")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)
                  }else if($('#input_status').val() == 'Consulta'){
                      $("#products_table").show()
                      $("#button_materiales").prop("disabled",false)                   
                      $("#modificarCita").prop("disabled",false)
                      $("#modificarCita").html("Continuar Consulta")
                      $("#envia_modelo").prop("disabled",false)
                      $("#TerminarCita").prop("disabled",false)
                  }else if($('#input_status').val() == 'Generado'){
                      $("#products_table").hide()
                      $("#button_materiales").prop("disabled",true)             
                      $("#modificarCita").prop("disabled",true)
                      $("#modificarCita").html("Iniciar Consulta")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)
                  }else if($('#input_status').val() == 'Confirmado'){
                      $("#products_table").hide()
                      $("#button_materiales").prop("disabled",true)              
                      $("#modificarCita").prop("disabled",true)
                      $("#modificarCita").html("Iniciar Consulta")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)  
                  }else if($('#input_status').val() == 'Terminada'){
                      $("#products_table").show()  
                      $("#button_materiales").prop("disabled",true)              
                      $("#modificarCita").prop("disabled",true)
                      $("#modificarCita").html("Finalizada")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)

                  }
              },               
              eventDrop: function(calEvent){
                  $('#input_id').val(calEvent.id);
                  $('#input_color').val(calEvent.color);
                  $('#tituloEvento').html(calEvent.servicio);
                  $('#input_paciente').val(calEvent.title);                   
                  $('#input_doctor').val(calEvent.doctor);                   
                  $('#input_doctor_asignado').val(calEvent.doctor_asignado);                   
                  $('#input_enfermera').val(calEvent.enfermera);                   
                  $('#input_status').val(calEvent.estatus);                   
                  $('#input_servicio').val(calEvent.servicio);                   
                  $('#input_cubiculo').val(calEvent.cubiculo);
                  
                  var FechaHora = calEvent.start.format().split("T");            
                  
                  $('#input_fecha').val(FechaHora[0]);                   
                  $('#input_horaini').val(FechaHora[1]);
                  
                  var FechaHoraFin = calEvent.end.format().split("T");
                  
                  
                  RecolectarDatosGUI();
                  EnviarInformacion('modificar',NuevoEvento,true);                                     
              },
              defaultView: 'month'
          });
          
          $('#calendario_cf').fullCalendar({
              header:{
                  left:'prev,today,next',
                  center: 'title',
                  right: 'month, agendaWeek, agendaDay'
              },
              contentHeight: 'auto',
              minTime:'09:00:00',
              maxTime:'22:00:00',
              /*dayClick:function(date,jsEvent,view){
                  $("#generarIngreso").prop("disabled",true);
                  $("#insertarCita").prop("disabled",false);
                  $("#modificarCita").prop("disabled",true);
                  $("#borrarCita").prop("disabled",true);
                  limpiarFormulario();
                  $('#input_fecha').val(date.format());
                  $("#ModalEventos").modal();                   
              },*/
              events:'/clinica/php/eventos_doctor/eventos_doctor_confirmado.php',
              eventClick: function(calEvent,jsEvent,view){
                
                  var paciente = calEvent.title.split("--"); 
                  var status = calEvent.estatus;
                  $("#generarIngreso").prop("disabled",false);
                  $("#insertarCita").prop("disabled",true);
                  $("#modificarCita").prop("disabled",false);
                  $("#borrarCita").prop("disabled",false);
                  $('#input_id').val(calEvent.id);
                  $('#input_rs').val(calEvent.razon_social);
                  $('#tituloEvento').html(calEvent.servicio);
                  $('#input_paciente').val(paciente[0]);                   
                  $('#input_doctor').val(calEvent.doctor);                   
                  $('#input_doctor_asignado').val(calEvent.doctor_asignado);                   
                  $('#input_enfermera').val(calEvent.enfermera);                   
                  $('#input_status').val(calEvent.estatus);                   
                  $('#input_servicio').val(calEvent.servicio);                   
                  $('#input_cubiculo').val(calEvent.cubiculo); 
                  FechaHora = calEvent.start._i.split(" ");
                  FechaHoraFin = calEvent.end._i.split(" ");
                  $('#input_fecha').val(FechaHora[0]);                   
                  $('#input_horaini').val(FechaHora[1]);                   
                  $('#input_horafin').val(FechaHoraFin[1]);                   
                  $("#ModalEventos").modal();
                  console.log(status);
                  var id = $('#input_id').val();
                    var tbody = document.getElementById("tbody_t")
                    var paciente = $('#input_paciente').val();
                    var servicio = $('#input_servicio').val();
                    //EnviarInformacion('modificar',NuevoEvento);
                    var tr_prodt = document.createElement("TR");
                    var td_prodt = document.createElement("TD");
                    td_prodt.setAttribute("class","tdprodt");
                    td_prodt.innerHTML = id;
                    var prod_tab = document.getElementById("products_table");
                    tr_prodt.appendChild(td_prodt);
                    prod_tab.appendChild(tr_prodt);
                    $("#products_table").show();
                    document.getElementById("tbody_t").innerHTML = ""
                    $.post("/clinica/php/consult_mat.php",{"paciente":paciente,"id":id}).done(function(data){

                      for(var i = 0; i<JSON.parse(data).length;i++){
                        var tr = document.createElement("TR")
                        for(var j = 0; j<JSON.parse(data)[i].length;j++){
                          var td = document.createElement("TD")
                          if(j == 6){
                            td.id = "subtotal"
                            td.innerHTML = "$" +JSON.parse(data)[i][j].toString() + ".00"
                          }else{
                            if(JSON.parse(data)[i][j] === ""){

                              td.innerHTML = "<input class='observ'>"
                              td.id = "td_input_obs"
                            }else{
                              td.innerHTML = JSON.parse(data)[i][j]
                            }


                          }
                          tr.appendChild(td)
                        }
                        var button = document.createElement("BUTTON")
                        button.innerHTML = "Borrar"
                        button.id = "button_borrar"
                        button.setAttribute("class","button_borrar btn btn-primary")
                        button.setAttribute("type","button")
                        tr.appendChild(button)
                        tbody.append(tr)
                      }
                      if(status == "Terminada"){
                        $(".button_borrar").prop("disabled",true)
                      }
                      var td_total = document.createElement("TD");
                      var tr_total = document.createElement("TR")
                      tbody.append(tr_total)
                      var total = 0;
                      tr_total.id = "tr_total"
                      tr_total.appendChild(td_total);
                            //table.appendChild(tr)
                            //table.appendChild(tr_total);
                    [].forEach.call(document.querySelectorAll("#products_table > tbody > tr > td"), function(td){
                                if(td.id == "subtotal"){
                                    total += parseFloat(td.innerHTML.split("$")[1]);
                                  }
                            });
                            td_total.innerHTML = "Total " + "$"+total.toString();
                    })

                  if($('#input_status').val() == 'Espera'){
                      $("#products_table").hide()
                      $("#button_materiales").prop("disabled",true)                   
                      $("#modificarCita").prop("disabled",false)
                      $("#modificarCita").html("Iniciar Consulta")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)
                  }else if($('#input_status').val() == 'Consulta'){
                      $("#products_table").show()
                      $("#button_materiales").prop("disabled",false)                   
                      $("#modificarCita").prop("disabled",false)
                      $("#modificarCita").html("Continuar Consulta")
                      $("#envia_modelo").prop("disabled",false)
                      $("#TerminarCita").prop("disabled",false)
                  }else if($('#input_status').val() == 'Generado'){
                      $("#products_table").hide()
                      $("#button_materiales").prop("disabled",true)             
                      $("#modificarCita").prop("disabled",true)
                      $("#modificarCita").html("Iniciar Consulta")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)
                  }else if($('#input_status').val() == 'Confirmado'){
                      $("#products_table").hide()
                      $("#button_materiales").prop("disabled",true)              
                      $("#modificarCita").prop("disabled",true)
                      $("#modificarCita").html("Iniciar Consulta")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)  
                  }else if($('#input_status').val() == 'Terminada'){
                      $("#products_table").show()  
                      $("#button_materiales").prop("disabled",true)              
                      $("#modificarCita").prop("disabled",true)
                      $("#modificarCita").html("Finalizada")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)

                    }
                },               
                eventDrop: function(calEvent){
                    $('#input_id').val(calEvent.id);
                    $('#input_color').val(calEvent.color);
                    $('#tituloEvento').html(calEvent.servicio);
                    $('#input_paciente').val(calEvent.title);                   
                    $('#input_doctor').val(calEvent.doctor);                   
                    $('#input_doctor_asignado').val(calEvent.doctor_asignado);                   
                    $('#input_enfermera').val(calEvent.enfermera);                   
                    $('#input_status').val(calEvent.estatus);                   
                    $('#input_servicio').val(calEvent.servicio);                   
                    $('#input_cubiculo').val(calEvent.cubiculo);
                    
                    var FechaHora = calEvent.start.format().split("T");            
                    
                    $('#input_fecha').val(FechaHora[0]);                   
                    $('#input_horaini').val(FechaHora[1]);
                    
                    var FechaHoraFin = calEvent.end.format().split("T");
                    
                    
                    RecolectarDatosGUI();
                    EnviarInformacion('modificar',NuevoEvento,true);                                     
                },
                defaultView: 'month'
            });
          
          
          
          
          
          
          
          
          
          });

          $('#calendario_c').fullCalendar({
                header:{
                    left:'prev,today,next',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay'
                },
                contentHeight: 'auto',
                minTime:'09:00:00',
                maxTime:'22:00:00',
                /*dayClick:function(date,jsEvent,view){
                    $("#generarIngreso").prop("disabled",true);
                    $("#insertarCita").prop("disabled",false);
                    $("#modificarCita").prop("disabled",true);
                    $("#borrarCita").prop("disabled",true);
                    limpiarFormulario();
                    $('#input_fecha').val(date.format());
                    $("#ModalEventos").modal();                   
                },*/
                events:'/clinica/php/eventos_doctor/eventos_doctor_consulta.php',
                eventClick: function(calEvent,jsEvent,view){
                
                  var paciente = calEvent.title.split("--"); 
                  var status = calEvent.estatus;
                  $("#generarIngreso").prop("disabled",false);
                  $("#insertarCita").prop("disabled",true);
                  $("#modificarCita").prop("disabled",false);
                  $("#borrarCita").prop("disabled",false);
                  $('#input_id').val(calEvent.id);
                  $('#input_rs').val(calEvent.razon_social);
                  $('#tituloEvento').html(calEvent.servicio);
                  $('#input_paciente').val(paciente[0]);                   
                  $('#input_doctor').val(calEvent.doctor);                   
                  $('#input_doctor_asignado').val(calEvent.doctor_asignado);                   
                  $('#input_enfermera').val(calEvent.enfermera);                   
                  $('#input_status').val(calEvent.estatus);                   
                  $('#input_servicio').val(calEvent.servicio);                   
                  $('#input_cubiculo').val(calEvent.cubiculo); 
                  FechaHora = calEvent.start._i.split(" ");
                  FechaHoraFin = calEvent.end._i.split(" ");
                  $('#input_fecha').val(FechaHora[0]);                   
                  $('#input_horaini').val(FechaHora[1]);                   
                  $('#input_horafin').val(FechaHoraFin[1]);                   
                  $("#ModalEventos").modal();
                  console.log(status);
                  var id = $('#input_id').val();
                    var tbody = document.getElementById("tbody_t")
                    var paciente = $('#input_paciente').val();
                    var servicio = $('#input_servicio').val();
                    //EnviarInformacion('modificar',NuevoEvento);
                    var tr_prodt = document.createElement("TR");
                    var td_prodt = document.createElement("TD");
                    td_prodt.setAttribute("class","tdprodt");
                    td_prodt.innerHTML = id;
                    var prod_tab = document.getElementById("products_table");
                    tr_prodt.appendChild(td_prodt);
                    prod_tab.appendChild(tr_prodt);
                    $("#products_table").show();
                    document.getElementById("tbody_t").innerHTML = ""
                    $.post("/clinica/php/consult_mat.php",{"paciente":paciente,"id":id}).done(function(data){

                      for(var i = 0; i<JSON.parse(data).length;i++){
                        var tr = document.createElement("TR")
                        for(var j = 0; j<JSON.parse(data)[i].length;j++){
                          var td = document.createElement("TD")
                          if(j == 6){
                            td.id = "subtotal"
                            td.innerHTML = "$" +JSON.parse(data)[i][j].toString() + ".00"
                          }else{
                            if(JSON.parse(data)[i][j] === ""){

                              td.innerHTML = "<input class='observ'>"
                              td.id = "td_input_obs"
                            }else{
                              td.innerHTML = JSON.parse(data)[i][j]
                            }


                          }
                          tr.appendChild(td)
                        }
                        var button = document.createElement("BUTTON")
                        button.innerHTML = "Borrar"
                        button.id = "button_borrar"
                        button.setAttribute("class","button_borrar btn btn-primary")
                        button.setAttribute("type","button")
                        tr.appendChild(button)
                        tbody.append(tr)
                      }
                      if(status == "Terminada"){
                        $(".button_borrar").prop("disabled",true)
                      }
                      var td_total = document.createElement("TD");
                      var tr_total = document.createElement("TR")
                      tbody.append(tr_total)
                      var total = 0;
                      tr_total.id = "tr_total"
                      tr_total.appendChild(td_total);
                            //table.appendChild(tr)
                            //table.appendChild(tr_total);
                    [].forEach.call(document.querySelectorAll("#products_table > tbody > tr > td"), function(td){
                                if(td.id == "subtotal"){
                                    total += parseFloat(td.innerHTML.split("$")[1]);
                                  }
                            });
                            td_total.innerHTML = "Total " + "$"+total.toString();
                    })

                    if($('#input_status').val() == 'Espera'){
                      $("#products_table").hide()
                      $("#button_materiales").prop("disabled",true)                   
                      $("#modificarCita").prop("disabled",false)
                      $("#modificarCita").html("Iniciar Consulta")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)
                    }else if($('#input_status').val() == 'Consulta'){
                      $("#products_table").show()
                      $("#button_materiales").prop("disabled",false)                   
                      $("#modificarCita").prop("disabled",false)
                      $("#modificarCita").html("Continuar Consulta")
                      $("#envia_modelo").prop("disabled",false)
                      $("#TerminarCita").prop("disabled",false)
                    }else if($('#input_status').val() == 'Generado'){
                      $("#products_table").hide()
                      $("#button_materiales").prop("disabled",true)             
                      $("#modificarCita").prop("disabled",true)
                      $("#modificarCita").html("Iniciar Consulta")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)
                    }else if($('#input_status').val() == 'Confirmado'){
                      $("#products_table").hide()
                      $("#button_materiales").prop("disabled",true)              
                      $("#modificarCita").prop("disabled",true)
                      $("#modificarCita").html("Iniciar Consulta")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)  
                    }else if($('#input_status').val() == 'Terminada'){
                      $("#products_table").show()  
                      $("#button_materiales").prop("disabled",true)              
                      $("#modificarCita").prop("disabled",true)
                      $("#modificarCita").html("Finalizada")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)

                  }
                },               
                eventDrop: function(calEvent){
                    $('#input_id').val(calEvent.id);
                    $('#input_color').val(calEvent.color);
                    $('#tituloEvento').html(calEvent.servicio);
                    $('#input_paciente').val(calEvent.title);                   
                    $('#input_doctor').val(calEvent.doctor);                   
                    $('#input_doctor_asignado').val(calEvent.doctor_asignado);                   
                    $('#input_enfermera').val(calEvent.enfermera);                   
                    $('#input_status').val(calEvent.estatus);                   
                    $('#input_servicio').val(calEvent.servicio);                   
                    $('#input_cubiculo').val(calEvent.cubiculo);
                    
                    var FechaHora = calEvent.start.format().split("T");            
                    
                    $('#input_fecha').val(FechaHora[0]);                   
                    $('#input_horaini').val(FechaHora[1]);
                    
                    var FechaHoraFin = calEvent.end.format().split("T");
                    
                    
                    RecolectarDatosGUI();
                    EnviarInformacion('modificar',NuevoEvento,true);                                     
                },
                defaultView: 'month'
            });

            $('#calendario_t').fullCalendar({
                header:{
                    left:'prev,today,next',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay'
                },
                contentHeight: 'auto',
                minTime:'09:00:00',
                maxTime:'22:00:00',
                /*dayClick:function(date,jsEvent,view){
                    $("#generarIngreso").prop("disabled",true);
                    $("#insertarCita").prop("disabled",false);
                    $("#modificarCita").prop("disabled",true);
                    $("#borrarCita").prop("disabled",true);
                    limpiarFormulario();
                    $('#input_fecha').val(date.format());
                    $("#ModalEventos").modal();                   
                },*/
                events:'/clinica/php/eventos_doctor/eventos_doctor_terminado.php',
                eventClick: function(calEvent,jsEvent,view){
                
                  var paciente = calEvent.title.split("--"); 
                  var status = calEvent.estatus;
                  $("#generarIngreso").prop("disabled",false);
                  $("#insertarCita").prop("disabled",true);
                  $("#modificarCita").prop("disabled",false);
                  $("#borrarCita").prop("disabled",false);
                  $('#input_id').val(calEvent.id);
                  $('#input_rs').val(calEvent.razon_social);
                  $('#tituloEvento').html(calEvent.servicio);
                  $('#input_paciente').val(paciente[0]);                   
                  $('#input_doctor').val(calEvent.doctor);                   
                  $('#input_doctor_asignado').val(calEvent.doctor_asignado);                   
                  $('#input_enfermera').val(calEvent.enfermera);                   
                  $('#input_status').val(calEvent.estatus);                   
                  $('#input_servicio').val(calEvent.servicio);                   
                  $('#input_cubiculo').val(calEvent.cubiculo); 
                  FechaHora = calEvent.start._i.split(" ");
                  FechaHoraFin = calEvent.end._i.split(" ");
                  $('#input_fecha').val(FechaHora[0]);                   
                  $('#input_horaini').val(FechaHora[1]);                   
                  $('#input_horafin').val(FechaHoraFin[1]);                   
                  $("#ModalEventos").modal();
                  console.log(status);
                  var id = $('#input_id').val();
                    var tbody = document.getElementById("tbody_t")
                    var paciente = $('#input_paciente').val();
                    var servicio = $('#input_servicio').val();
                    //EnviarInformacion('modificar',NuevoEvento);
                    var tr_prodt = document.createElement("TR");
                    var td_prodt = document.createElement("TD");
                    td_prodt.setAttribute("class","tdprodt");
                    td_prodt.innerHTML = id;
                    var prod_tab = document.getElementById("products_table");
                    tr_prodt.appendChild(td_prodt);
                    prod_tab.appendChild(tr_prodt);
                    $("#products_table").show();
                    document.getElementById("tbody_t").innerHTML = ""
                    $.post("/clinica/php/consult_mat.php",{"paciente":paciente,"id":id}).done(function(data){

                      for(var i = 0; i<JSON.parse(data).length;i++){
                        var tr = document.createElement("TR")
                        for(var j = 0; j<JSON.parse(data)[i].length;j++){
                          var td = document.createElement("TD")
                          if(j == 6){
                            td.id = "subtotal"
                            td.innerHTML = "$" +JSON.parse(data)[i][j].toString() + ".00"
                          }else{
                            if(JSON.parse(data)[i][j] === ""){

                              td.innerHTML = "<input class='observ'>"
                              td.id = "td_input_obs"
                            }else{
                              td.innerHTML = JSON.parse(data)[i][j]
                            }


                          }
                          tr.appendChild(td)
                        }
                        var button = document.createElement("BUTTON")
                        button.innerHTML = "Borrar"
                        button.id = "button_borrar"
                        button.setAttribute("class","button_borrar btn btn-primary")
                        button.setAttribute("type","button")
                        tr.appendChild(button)
                        tbody.append(tr)
                      }
                      if(status == "Terminada"){
                        $(".button_borrar").prop("disabled",true)
                      }
                      var td_total = document.createElement("TD");
                      var tr_total = document.createElement("TR")
                      tbody.append(tr_total)
                      var total = 0;
                      tr_total.id = "tr_total"
                      tr_total.appendChild(td_total);
                            //table.appendChild(tr)
                            //table.appendChild(tr_total);
                    [].forEach.call(document.querySelectorAll("#products_table > tbody > tr > td"), function(td){
                                if(td.id == "subtotal"){
                                    total += parseFloat(td.innerHTML.split("$")[1]);
                                  }
                            });
                            td_total.innerHTML = "Total " + "$"+total.toString();
                    })

                  if($('#input_status').val() == 'Espera'){
                      $("#products_table").hide()
                      $("#button_materiales").prop("disabled",true)                   
                      $("#modificarCita").prop("disabled",false)
                      $("#modificarCita").html("Iniciar Consulta")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)
                  }else if($('#input_status').val() == 'Consulta'){
                      $("#products_table").show()
                      $("#button_materiales").prop("disabled",false)                   
                      $("#modificarCita").prop("disabled",false)
                      $("#modificarCita").html("Continuar Consulta")
                      $("#envia_modelo").prop("disabled",false)
                      $("#TerminarCita").prop("disabled",false)
                  }else if($('#input_status').val() == 'Generado'){
                      $("#products_table").hide()
                      $("#button_materiales").prop("disabled",true)             
                      $("#modificarCita").prop("disabled",true)
                      $("#modificarCita").html("Iniciar Consulta")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)
                  }else if($('#input_status').val() == 'Confirmado'){
                      $("#products_table").hide()
                      $("#button_materiales").prop("disabled",true)              
                      $("#modificarCita").prop("disabled",true)
                      $("#modificarCita").html("Iniciar Consulta")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)  
                  }else if($('#input_status').val() == 'Terminada'){
                      $("#products_table").show()  
                      $("#button_materiales").prop("disabled",true)              
                      $("#modificarCita").prop("disabled",true)
                      $("#modificarCita").html("Finalizada")
                      $("#envia_modelo").prop("disabled",true)
                      $("#TerminarCita").prop("disabled",true)

                    }
                },               
                eventDrop: function(calEvent){
                    $('#input_id').val(calEvent.id);
                    $('#input_color').val(calEvent.color);
                    $('#tituloEvento').html(calEvent.servicio);
                    $('#input_paciente').val(calEvent.title);                   
                    $('#input_doctor').val(calEvent.doctor);                   
                    $('#input_doctor_asignado').val(calEvent.doctor_asignado);                   
                    $('#input_enfermera').val(calEvent.enfermera);                   
                    $('#input_status').val(calEvent.estatus);                   
                    $('#input_servicio').val(calEvent.servicio);                   
                    $('#input_cubiculo').val(calEvent.cubiculo);
                    
                    var FechaHora = calEvent.start.format().split("T");            
                    
                    $('#input_fecha').val(FechaHora[0]);                   
                    $('#input_horaini').val(FechaHora[1]);
                    
                    var FechaHoraFin = calEvent.end.format().split("T");
                    
                    
                    RecolectarDatosGUI();
                    EnviarInformacion('modificar',NuevoEvento,true);                                     
                },
                defaultView: 'month'
            });

	</script>
  <!--Modal para agregar materiales--->
    <div class="modal fade" id="ModalMateriales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:1600;" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Materiales</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <div class="form-group has-search">
                      <span class="fa fa-search form-control-feedback"></span>
                      <input type="text" class="form-control" id="input_bus_mat" list="listd" placeholder="Selecciona un material ....">
                      <datalist id="listd"></datalist>                      
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <button type ="button" class = "btn btn-primary" id = "buscar_mats">Buscar</button>
                        </div>
                    </div>  
                    <div id="panel_consulta">
                        <table class="table table-condensed" id="tabla-modal">
                            <tr>
                                <td>CVE_ART</td>
                                <td id = "cve_art"></td>
                            </tr>
                            <tr>
                                <td>DESCRIP</td>
                                <td id = "descrip"></td>
                            </tr>
                            <tr>
                              <td>Observaciones</td>
                              <td><input type="text" id = "obs"></td> 
                            </tr>
                            <tr>
                                <td>Existencias</td>
                                <td id = "exist"></td>
                            </tr>
                            <tr>
                                <td>Precio</td>
                                <td><input type="text" id="precio"</td>
                            </tr>
                            <tr>
                                <td>Precio Sugerido</td>
                                <td><input type="text" id="precio_sug" disabled</td>
                            </tr>
                            <tr>
                                <td>Cantidad</td>
                                <td><input type="text" class = "cant" id = "cant"></td>
                            </tr>    
                            <tr>
                                <td>Subtotal</td>
                                <td id = "sub">$0.00</td>
                            </tr>                            
                        </table>
                    </div>                    
                    <div class="modal-footer">
                      
                        <script type='text/javascript'>  
                      var list_abs = [];
                      $("#input_bus_mat").on("keyup",function(e){
                        if(e.keyCode == 13){
                          for(var i = 0; i < list_abs.length; i++){
                          if(list_abs[i].DESCRIP == $("#input_bus_mat").val()){
                            select_material(list_abs[i].CLAVE, $("#input_bus_mat").val())
                          }
                        }
                        }
                      })
                      $("#buscar_mats").click(function(){
                        for(var i = 0; i < list_abs.length; i++){
                          if(list_abs[i].DESCRIP == $("#input_bus_mat").val()){
                            select_material(list_abs[i].CLAVE, $("#input_bus_mat").val())
                          }
                        }
                      })
                      function getBus(){
                        //console.log(input.value)
                      }               
                      function b_mat(){
                        $.post("/clinica/php/busqueda_mat.php",{"hola":1}).done(function(data){
                          var list = JSON.parse(data);
                          var option = '';
                          var i;
                          var d_list = document.getElementById("listd")
                          for(i = 0; i < list.length; i++){
                            option += '<option data-id="'+list[i].CLAVE +'"' +  ' value="' + list[i].DESCRIP + '" />';
                          }
                          d_list.innerHTML = option;
                          list_abs = list;
                        })
                      }
                        function select_material(c,n){
                            var clave = n;
                            var name = c;
                            
                            var a = {"name":name};

                            $.ajax({
                                data: a,                            
                                url: "php/mostrar_materiales_doctor.php",
                                type: "post",
                                beforeSend: function(){
                                    /*$("#modal_prod").html("Procesando, espere por favor...");*/
                                },
                                success: function(response){
                                    $("#panel_consulta").html(response);
                                }
                            });
                        }      
                        $("#cerrar").click(function(){
                          document.getElementById("ModalMateriales").innerHTML = "";
                        })                 
                        
                    </script>
                        <button type ="button" class = "btn btn-primary agrega" id = "agrega_m">Agregar</button>                
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                    </div>                   
                </div>                
            </div>
        </div>
    </div>
    <!--Modal de eventos--->
  <div class="modal fade bd-example-modal-lg" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="z-index:1400;overflow-y:scroll;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" id="Mk">
        <div class="modal-header">
          <h5 class="modal-title" id="tituloEvento">Cita</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="overflow_scroll;">
          <div id="descripcionEvento"></div>
        </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                    <input type="hidden" name="id" value="" class="form-control hide" placeholder="Paciente" id="input_id">
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                    <input type="hidden" name="rs" value="" class="form-control hide" placeholder="Paciente" id="input_rs">
              </div>
          </div>
          <div class="container">
              <div class="row justify-content-center">
                  <button type="button" class="btn btn-primary" id="modificarCita">Continuar/Iniciar</button>
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col-md-12">
                    <span>Paciente: </span>
                    <input type="text" name="paciente" value="" class="form-control hide" placeholder="Paciente" id="input_paciente" readonly>                                       
              </div>
          </div>                       
              <div class="form-row">
              <div class="form-group col-md-12">
                    <span>Doctor: </span>                        
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
                        <span>Doctor Asignado: </span>
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
                    <span>Servicio: </span>
                    <select class="form-control" name="servicio" id="input_servicio">
                        <?php
                          if($gestor_db == true) {
                              $sql = "SELECT * FROM INVE01 IV LEFT JOIN PRECIO_X_PROD01 PP ON PP.CVE_ART = IV.CVE_ART
                              WHERE PP.CVE_PRECIO = 1 AND IV.TIPO_ELE = 'S'";
                              $gestor_sent = ibase_query($gestor_db, $sql);
                              $coln = ibase_num_fields($gestor_sent);
                              while ($t = ibase_fetch_object($gestor_sent)){
                                  $descr = $t-> DESCR;
                                  $precio = $t-> PRECIO;
                                  $cve_artP = $t -> CVE_ART;
                                  echo "<option>$descr</option>";
                              }
                          }echo $descr."--".$precio.$cve_artP;
                        ?>
                    </select>
                    <!--<input type="text" name="servicio" value="" class="form-control" placeholder="Servicio" id="input_servicio">-->
              </div>        
              <div class="form-group col-md-6">
                    <span>Cubículo: </span>                   
                    <select class="form-control" name="cubiculo" id="input_cubiculo" placeholder="Cubículo">
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
                      <input type="hidden" name="status" value="" class="form-control hide" placeholder="Paciente" id="input_status">                                          
                  </div>
              </div>
          <div class="form-row">
              <div class="form-group col-md-12">
                    <span>Fecha: </span><input type="date" name="Fecha" value="" class="form-control" placeholder="Fecha" id="input_fecha" readonly>
              </div>             
          </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                    <span>Hora inicial: </span>
                    <div class="input-group clockpicker" data-autoclose="true">
                        <input type="text" name="ini" class="form-control" id="input_horaini" readonly>
                    </div>
              </div>
              <div class="form-group col-md-6">
                    <span>Hora final: </span>
                    <div class="input-group" data-autoclose="true">
                        <input type="text" name="fin" class="form-control"  id="input_horafin" readonly>
                    </div>
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                    <input type="hidden" name="color" value="" class="form-control" id="input_color">
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col-md-8">
                  <button class="btn btn-primary" id="button_materiales"> Material y/o Servicio</button>      
                  <!--<button class="btn btn-primary" id="envia_modelo"> Enviar Modelo</button>                    -->
                                      
                  <button type="button" class="btn btn-danger" id="TerminarCita">Terminar Consulta</button>                                                         
                  <button type="button" class="btn btn-warning" id="modificar_cita">Modificar Consulta</button>                  
              </div>
              <div class="form-group col-md-4" style="display:flex;justify-content:flex-end;">
                  <button type="button" class="btn btn-secondary" id="canc">Cancelar</button>
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col-md-12">
                <table class="table table-responsive" id="products_table">
                    <thead>
                        <tr>
                            <th>Clave</th>
                            <th>Descripción</th>
                            <th>Observaciones</th>
                            <th>Precio</th>
                            <th>Precio Sugerido</th>                            
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tbody_t">

                    </tbody>
                </table> 
              </div>
          </div>           
      </div>
    </div>
  </div>

	<div class="container">

    <!--<button class="btn btn-primary" id="reset"> Borrar</button>-->
    
	</div>	
	<script>
        $("#cerrar").click(function(){
          limpiarFormMateriales()
        })
        $('#reset').click(function(){
          document.getElementById("td_Stot").innerHTML = ""
          document.getElementById("td_cantidad").innerHTML = ""
          document.getElementById("td_precio").innerHTML = ""
          document.getElementById("td_mat").innerHTML = ""
          document.getElementById("td_tot").innerHTML = ""
        })        
        
        $('#TerminarCita').click(function(){
            months = ["01","02","03","04","05","06","07","08","09","10","11","12"];
            var date = new Date()
          $.post("/clinica/php/update_end_date.php",{"fecha": date.getFullYear() + "-" + months[date.getMonth()] + "-" + date.getDate() + " " + date.getHours() + ":" + date.getMinutes() + ":00", "id": $("#input_id").val()}).done(function(){
            //console.log("Listo")
          })
            $("#button_materiales").prop("disabled",true)
            $(".button_borrar").prop("disabled",true)
            RecolectarDatosGUI();
            EnviarInformacion('terminar',NuevoEvento);
            var paciente = $('#input_paciente').val();
            var id = $('#input_id').val();
            var temp = [];
            var list_s = [];
            var list_t = [];
            var list_productos = [];
            var s = "";
            var i = 0;
            [].forEach.call(document.querySelectorAll("#products_table >tbody > tr > td"), function(td){
                if(td.innerHTML.includes("Total")){
                  s += ";;;." + td.innerHTML
                }else if(td.id == "td_input_obs"){
                  s += td.children[0].value + "///."
                }else{
                  s += td.innerHTML + "///."
                }
              })
            temp = s.split(";;;.")
              list_productos = temp[0].split("///.")
              list_productos.forEach(function(e){
                if(e.includes(".00") || e[e.length - 1] == "$"){
                  list_s.push(e.split(".00")[0].split("$")[1])

                  list_t.push(list_s)                  
                  list_s = []
                    
                }else{
                    
                  list_s.push(e)
                }
              })
            for (var i = 0; i < list_t.length; i+=1) {
                for (var j= 0; j < list_t[i].length; j+=1){
                    list_t.push({name: "keyProds["+i+"]["+j+"]",value:list_t[i][j]});
                }
            }
            list_t.push({name:"paciente",value:paciente});
            list_t.push({name:"id",value:id});
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: 'php/insert_new_mat.php',
                data: list_t,
                success:function(data){
                    
                }
            })
            //alert("Materiales Guardados");
            //$('#ModalEventos').modal('hide')
            var id_cita = $("#input_id").val();
            //console.log(id_cita);
            var razon_social = $('#input_rs').val();
            //var servi = $('#input_servicio').val();
            var paciente = $('#input_paciente').val();
            var docAsignado = $('#input_doctor_asignado').val()
            var enfermera = $('#input_enfermera').val()
            var total = $('#tr_total').text()
            var horaM = date.getHours()+":"+date.getMinutes()
            var cubiculo = $("#input_cubiculo").val()
            var servicio = $("#input_servicio").val()
            /*console.log(paciente);
            console.log(razon_social);*/
            var temp = [];
            var list_s = [];
            var list_t = [];
            var list_productos = [];
            var s = "";
            var i = 0;
            [].forEach.call(document.querySelectorAll("#products_table > tbody > tr > td"), function(td){
                if(td.innerHTML.includes("Total")){
                  s += ";;;." + td.innerHTML
                }else if(td.id == "td_input_obs"){
                  s += td.children[0].value + "///."
                }else{
                  s += td.innerHTML + "///."
                }
              })
            temp = s.split(";;;.")
              list_productos = temp[0].split("///.")
              list_productos.forEach(function(e){
                if(e.includes(".00") || e[e.length - 1] == "$"){
                  list_s.push(e)
                  //list_s.push(servi)
                  list_t.push(list_s)                  
                  list_s = []
                    //console.log(list_s);
                }else{
                    //console.log(list_s);
                  list_s.push(e)
                }
              })
            for (var i = 0; i < list_t.length; i+=1) {
                for (var j= 0; j < list_t[i].length; j+=1){
                    list_t.push({name: "keyProds["+i+"]["+j+"]",value:list_t[i][j]});
                    
                }
            }//console.log(list_t)
            list_t.push({name:"paciente",value:paciente});
            list_t.push({name:"razon_social",value:razon_social});
            list_t.push({name:"docAsignado",value:docAsignado});
            list_t.push({name:"enfermera",value:enfermera});
            list_t.push({name:"id_cita",value:id_cita});
            list_t.push({name:"total",value:total});
            list_t.push({name:"horaM",value:horaM});
            list_t.push({name:"cubiculo",value:cubiculo});
            list_t.push({name:"servicio",value:servicio});
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: 'php/generar_mod.php',
                data: list_t,
                success:function(data){
                    console.log(data);
                }
            })
            alert("Cita terminada")
            $('#ModalEventos').modal('hide')
            //$("#products_table").hide();
        });
        $('#envia_modelo').click(function(){
            
        });
        function limpiarFormMateriales(){
            $('#input_bus_mat').val('')
            $('#cve_art').text('')
            $('#descrip').text('')            
            $('#obs').val(' ')            
            $('#exist').text('')            
            $('#cant').val('')
            $('#tbody_t').val('') 
            $('#precio').val('')
            $('#sub').text('')
            $('#precio_sug').val('')
        }    
        var i = 0
        $('#agrega_m').click(function(){
          
            try {
                i++
                var cant = document.getElementById("cant").value
                var prec_sug = document.getElementById("precio_sug").value
                if (document.getElementById("cve_art").innerHTML == "" || document.getElementById("cve_art").innerHTML == null){
                    alert("Ningún material seleccionado")
                } else {
                    var obs = document.getElementById("obs").value
                    var cve_art = document.getElementById("cve_art").innerHTML
                    var descrip = document.getElementById("descrip").innerHTML
                    var prec = document.getElementById("precio").value
                    var subtotal = document.getElementById("sub").innerHTML
                    if(cant == "0" || cant == 0){
                      alert("La cantidad no puede ser vacía")
                    }else{
                      var table = document.getElementById("products_table")
                    var td_cant = document.createElement("TD")
                    var td_precio = document.createElement("TD")
                    var td_obs = document.createElement("TD")
                    var td_prec_sug = document.createElement("TD") 
                    if(obs.length == 0){
                      obs = document.createElement("INPUT")
                      td_obs.appendChild(obs)
                      td_obs.id = "td_input_obs"
                      obs.setAttribute("class","observ")
                    }else{
                      td_obs.setAttribute("class","observ")
                      td_obs.innerHTML = obs            
                    }
                    var td_sub = document.createElement("TD")
                    var td_cve = document.createElement("TD")
                    var td_descrip = document.createElement("TD")
                    var td_total = document.createElement("TD")
                    var tr = document.createElement("TR")
                    var tr_total = document.createElement("TR")
                    var button = document.createElement("BUTTON")
                    var tbody = document.getElementById("tbody_t")
                    td_cant.setAttribute("class","cant")
                    td_cant.innerHTML = cant
                    td_precio.innerHTML = prec
                    td_prec_sug.innerHTML = prec_sug
                    td_sub.id = "subtotal"
                    td_sub.innerHTML = subtotal
                    td_cve.innerHTML = cve_art
                    td_descrip.innerHTML = descrip
                    button.innerHTML = "Borrar"
                    button.id = "button_borrar"
                    button.setAttribute("class","button_borrar btn btn-primary")
                    button.setAttribute("type","button")
                    tr.appendChild(td_cve)
                    tr.appendChild(td_descrip)
                    tr.appendChild(td_obs)
                    tr.appendChild(td_precio)
                    tr.appendChild(td_prec_sug)
                    tr.appendChild(td_cant)
                    tr.appendChild(td_sub)
                    tr.appendChild(button)
                    tbody.append(tr)
                    tbody.append(tr_total)
                    var total = 0;
                    tr_total.id = "tr_total"
                    tr_total.appendChild(td_total);
                    //table.appendChild(tr)
                    //table.appendChild(tr_total);
                    [].forEach.call(document.querySelectorAll("#products_table > tbody > tr > td"), function(td){
                        if(td.id == "subtotal"){
                            total += parseFloat(td.innerHTML.split("$")[1]);
                          }
                    });
                    td_total.innerHTML = "Total " + "$"+total.toString();
                    [].forEach.call(document.querySelectorAll("#products_table > tbody > tr"),function(tr){            
                      if(tr.id == "tr_total" && i > 1){
                        tbody.removeChild(tr)
                        tbody.append(tr_total)                        
                      }
                    })
                    alert("Producto Agregado");
                    }

                }               
                limpiarFormMateriales();

                $('#ModalMateriales').modal('hide')
            } catch(error) {
                
            }            
      
        });        
            $(document).on("click",".button_borrar",function(e){
            if(document.getElementById("products_table").rows.length == 2 || document.getElementById("products_table").rows.length == "2"){
              document.getElementById("products_table").deleteRow(document.getElementById("tr_total").rowIndex)
            }else{
              eu = e['originalEvent']['target'].closest("tr").cells[e['originalEvent']['target'].closest("tr").cells.length-1]['firstChild']['data'];
              [].forEach.call(document.querySelectorAll('#products_table > tbody > tr'),function(tr){
                if(tr.id == "tr_total"){
                  io = tr.cells[0].innerHTML.split(" ")
                  temp2 = io[1].split("$")
                  temp2.push(eu.split("$")[1])
                  console.log(temp2)
                  nr = parseFloat(temp2[1]) - parseFloat(temp2[2])
                  if(nr % 1 != 0){
                    console.log(io)
                    nr = nr * 1.16
                    io = nr.toString().split(".")
                    eu = io[0] + "." + io[1][0] + io[1][0]
                    nr = parseFloat(eu)
                  }
                  tr.cells[0].innerHTML = ""
                  tr.cells[0].innerHTML = "Total " + "$"+nr.toString()
                  temp2 = []
                  io = []
                  nr = 0
                  eu = ""
                }
              })
            }
            document.getElementById("products_table").deleteRow(e['originalEvent']['target'].closest("tr").rowIndex)
            })      

        var NuevoEvento; 
        $("#modificar_cita").click(function(){
          RecolectarDatosGUI()
          EnviarInformacion('modificar_cita',NuevoEvento)
          alert("Se han modificado los datos de la Consulta")
          $("#ModalEventos").modal('toggle')
        })         
        $("#modificarCita").click(function(){
            
            //document.getElementById("envia_modelo").setAttribute("name",$("#input_paciente").val() + " " + $("#input_id").val())
            var list_p = [];
            var y = 0;
            RecolectarDatosGUI();
            //$('#input_horafin').val(FechaHoraFin[1]);
            var id = $('#input_id').val();
            var tbody = document.getElementById("tbody_t")
            var paciente = $('#input_paciente').val();
            var servicio = $('#input_servicio').val();
            EnviarInformacion('modificar',NuevoEvento);
            var tr_prodt = document.createElement("TR");
            var td_prodt = document.createElement("TD");
            td_prodt.setAttribute("class","tdprodt");
            td_prodt.innerHTML = id;
            var prod_tab = document.getElementById("products_table");
            tr_prodt.appendChild(td_prodt);
            prod_tab.appendChild(tr_prodt);
            $("#products_table").show();
            document.getElementById("tbody_t").innerHTML = ""
            $.post("/clinica/php/consult_mat.php",{"paciente":paciente,"id":id}).done(function(data){
              
              for(var i = 0; i<JSON.parse(data).length;i++){
                var tr = document.createElement("TR")
                for(var j = 0; j<JSON.parse(data)[i].length;j++){
                  var td = document.createElement("TD")
                  //console.log(j % 6)
                  if(j == 6){
                    td.id = "subtotal"
                    td.innerHTML = "$" +JSON.parse(data)[i][j].toString() + ".00"
                  }else{
                    if(JSON.parse(data)[i][j] == ""){
                      td.innerHTML = "<input class='observ'>"
                      td.id = "td_input_obs"
                    }else{
                      td.innerHTML = JSON.parse(data)[i][j]
                    }
                    
                  
                  }
                  tr.appendChild(td)
                }
                var button = document.createElement("BUTTON")
                button.innerHTML = "Borrar"
                button.id = "button_borrar"
                button.setAttribute("class","button_borrar btn btn-primary")
                button.setAttribute("type","button")

                tr.appendChild(button)
                tbody.append(tr)
              }
              var td_total = document.createElement("TD");
              var tr_total = document.createElement("TR")
              tbody.append(tr_total)
              var total = 0;
              tr_total.id = "tr_total"
              tr_total.appendChild(td_total);
                    //table.appendChild(tr)
                    //table.appendChild(tr_total);
            [].forEach.call(document.querySelectorAll("#products_table > tbody > tr > td"), function(td){
                        if(td.id == "subtotal"){
                            total += parseFloat(td.innerHTML.split("$")[1]);
                          }
                    });
                    td_total.innerHTML = "Total " + "$"+total.toString();
            })
            $("#ModalEventos").modal('hide');
            //$("#td_paciente").text(paciente);
            //$("#td_servicio").text(servicio);
        });
        $("#button_materiales").click(function(){
            $("#products_table").show();
            $("#ModalMateriales").modal();
            b_mat();
        });
        function RecolectarDatosGUI(){          
            
            NuevoEvento = {
                id: $("#input_id").val(),
                color: $("#input_color").val(),
                title: $("#input_paciente").val(),
                doctor: $("#input_doctor").val(),
                doctor_asignado: $("#input_doctor_asignado").val(),
                enfermera: $("#input_enfermera").val(),
                start: $("#input_fecha").val()+" "+$("#input_horaini").val(), 
                end: $("#input_fecha").val()+" "+$("#input_horafin").val(),                
                estatus: $("#input_status").val(),
                servicio: $("#input_servicio").val(),
                cubiculo: $("#input_cubiculo").val()                
            };  
        }          
        $("#canc").click(function(){
          if(confirm("¿Seguro que desea salir?")){
            $("#ModalEventos").modal('toggle')
          }else{

          }
        })
        function EnviarInformacion(accion,objEvento,modal,id){
            var id = $('#input_id').val();
            $.ajax({
                type: 'POST',
                url: 'eventos_doctor.php?accion='+accion,
                data: objEvento,
                success: function(msg){                   
                    if(msg){
                        //$.post("detalle_consulta.php",{"id":id});
                        //window.location="/clinica/detalle_consulta.php";                        
                        $("#calendario").fullCalendar('refetchEvents');
                        if(!modal){
                            //$("#ModalEventos").modal('toggle');
                          }                        
                    }
                },
                error: function(){
                    alert("error");
                }
            });
        }
        $('.clockpicker').clockpicker();
        function limpiarFormulario(){
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
    </script>
</body>
</html>