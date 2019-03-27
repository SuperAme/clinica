<?php 
    session_start();
    echo $_SESSION[0];
    $dat = $_SESSION['usuario']['tipo'];
    if($dat != 'R'){
       header('location: php/logout.php');
    }
    ?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
   <title>Recepción</title>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">
   <script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/jquery.js"></script>
   <script src="js/main.js"></script>
   <script src="js/recep.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <!-- Date Time Picker CSS -->        
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
   
   <!-- Main Style CSS -->
   <link href="css/styles.css" rel="stylesheet">   
</head>
<body>
  <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">PASS Consultores <sup><small><span class="label label-info">v1.0</span></small></sup> </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse" id= "div_recep">

         <ul class="nav navbar-nav">
          <li><a href="index.php?view=newreservation"><i class="fa fa-asterisk"></i> Nueva Cita</a></li>
          <li><a href="php/insertar_paciente.php"><i class="fa fa-male"></i> Nuevo Paciente</a></li>
          </ul> 
          <ul class="nav navbar-nav side-nav" id ="ul_inicio">
          <li><a href="index.php?view=home"><i class="fa fa-home"></i> Inicio</a></li>
          <li><a href="index.php?view=reservations"><i class="fa fa-calendar"></i> Citas</a></li>
          <li><a href="index.php?view=pacients"><i class="fa fa-male"></i> Pacientes</a></li>
          <li><a href="index.php?view=medics"><i class="fa fa-support"></i> Medicos</a></li>       
          </ul>
          <ul class="nav navbar-nav navbar-right navbar-user sesion">
              <li>Bienvenido: <?php echo $_SESSION['usuario']['nombre_usuario']; ?></li><br>
              <li><a href="php/logout.php">Cerrar sesión</a></li>
          </ul>
          
           
            
        <ul class="dropdown-menu">
          <li><a href="index.php?view=configuration">Configuracion</a></li>
          <li><a href="logout.php">Salir</a></li>
        </ul>





        </div><!-- /.navbar-collapse -->
      </nav>


      <div id="page-wrapper">
        <div class="col-lg-2">
          <br>
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-male"></i></span>
<select name="pacient_id" class="form-control">
<option value="">PACIENTE</option>
  <?php foreach($pacients as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if(isset($_GET["pacient_id"]) && $_GET["pacient_id"]!=""){ echo "selected"; } ?>><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    </div>
            <div class="col-lg-2">
              <br>
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-support"></i></span>
<select name="medic_id" class="form-control">
<option value="">MEDICO</option>
  <?php foreach($medics as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if(isset($_GET["medic_id"]) && $_GET["medic_id"]!=""){ echo "selected"; } ?>><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    </div>
            <div class="col-lg-4">
              <br>
              <div class="input-group"> 
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="date" name="date_at" class="form-control" placeholder="Palabra clave">
              </div>
            </div>
            
            <div class="col-lg-2">
              <br>
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-search"></i></span>
      <input type="text" name="q" value="<?php if(isset($_GET["q"]) && $_GET["q"]!=""){ echo $_GET["q"]; } ?>" class="form-control" placeholder="Palabra clave">
    </div>
    </div>

      </div><!-- /#page-wrapper -->

    </div>
    <br>
    <br>
    <div id="div_table">
      <br>
      <table id= "table_recep" class="table">
        <tr class="danger">
          <td class="td_head">
      <div class="input-group">
      <input type="text" name="q" value="<?php if(isset($_GET["q"]) && $_GET["q"]!=""){ echo $_GET["q"]; } ?>" class="form-control" placeholder="Paciente" id="input_paciente">
    </div>
          </td>
           <td class="td_head">
      <div class="input-group">
      <input type="text" name="q" value="<?php if(isset($_GET["q"]) && $_GET["q"]!=""){ echo $_GET["q"]; } ?>" class="form-control" placeholder="Doctor" id="input_paciente">
    </div>
          </td>
           <td class="td_head">
      <div class="input-group">
      <input type="text" name="q" value="<?php if(isset($_GET["q"]) && $_GET["q"]!=""){ echo $_GET["q"]; } ?>" class="form-control" placeholder="Servicio" id="input_paciente">
    </div>
          </td>
           <td class="td_head">
      <div class="input-group">
      <input type="text" name="q" value="<?php if(isset($_GET["q"]) && $_GET["q"]!=""){ echo $_GET["q"]; } ?>" class="form-control" placeholder="Cubículo" id="input_paciente">
    </div>
          </td>
           <td class="td_head">
      <div class="input-group">
      <input type="text" name="q" value="<?php if(isset($_GET["q"]) && $_GET["q"]!=""){ echo $_GET["q"]; } ?>" class="form-control" placeholder="Estatus" id="input_paciente">
    </div>
          </td>
         <td>
           <button id="button_acep">
             Aceptar
           </button>
         </td> 
        </tr>
      </table>
    </div>
    <script type="text/javascript">
      $(document).ready(function(){
        
        
        $("#button_acep").click(function(){
          list_t = [];
          i = 0;
          [].forEach.call(document.querySelectorAll('#table_recep > tbody > tr > td'),function(e){
            if(e.children[0].children[0] != undefined){
               list_t.push({name: "key"+i+"", value: e.children[0].children[0].value})
               i++;
            }
          })
          console.log(list_t)
          $.ajax({
                type: 'POST',
                dataType: 'JSON',            
                url: '/clinica/php/consulta.php',
                data: list_t,
                beforeSend: function(){
                  console.log('Enviando')
                },
                success: function(data){
                  list_t = [];
                  if(data.lol == "lol"){
                    alert("Cita agendada");
                  }             
                }
        })
      })
      })
    </script>
</body>
</html>