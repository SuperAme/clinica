<?php
    require 'conexion.php';
    $id = $_POST['id'];   
    $sql = $mysqli->query("SELECT * FROM usuarios where id = $id");                   
    while($result = mysqli_fetch_array($sql)){
        
      echo "<table class='table'><tr><td>id</td><td><input type='text' value='$result[0]' class='form-control' placeholder='Nombre' id='input_identify'></td>";
      echo "<tr><td>Nombre: </td><td><input type='text' value='$result[3]' class='form-control' placeholder='Nombre' id='input_nombre'></td>";
      echo "<tr><td>Nombre usuario: </td><td><input type='text' value='$result[1]' class='form-control' placeholder='Usuario' id='input_usuario'></td>";
      echo "<tr><td>Contraseña: </td><td><input type='text' value='$result[2]' class='form-control' placeholder='Contraseña' id='input_contra'></td>";
      echo "<tr><td>Comisión: </td><td><input type='text' value='$result[18]' class='form-control' placeholder='Comisión...' id='input_comision'></td>";
      switch ($result[10]){
          case A:
              echo "<tr><td>Tipo: </td><td><select name='combobox_cve' id='input_tipo' class='form-control'><option value='A' selected>Administrador</option><option value='R'>Recepcion</option><option value='E'>Enfermera</option><option value='D'>Doctor</option><option value='S'>Residente</option></select></td></table>";
              break;
          case D:
              echo "<tr><td>Tipo: </td><td><select name='combobox_cve' id='input_tipo' class='form-control'><option value='D' selected>Doctor</option><option value='R'>Recepcion</option><option value='E'>Enfermera</option><option value='A'>Administrador</option><option value='S'>Residente</option></select></td></table>";
              break;
          case R:
              echo "<tr><td>Tipo: </td><td><select name='combobox_cve' id='input_tipo' class='form-control'><option value='R' selected>Recepcion</option><option value='A'>Administrador</option><option value='E'>Enfermera</option><option value='D'>Doctor</option><option value='S'>Residente</option></select></td></table>";
              break;
          case E:
              echo "<tr><td>Tipo: </td><td><select name='combobox_cve' id='input_tipo' class='form-control'><option value='E' selected>Enfermera</option><option value='R'>Recepcion</option><option value='A'>Administrador</option><option value='D'>Doctor</option><option value='S'>Residente</option></select></td></table>";
              break;
          case S:
              echo "<tr><td>Tipo: </td><td><select name='combobox_cve' id='input_tipo' class='form-control'><option value='S' selected>Residente</option><option value='R'>Recepcion</option><option value='A'>Administrador</option><option value='D'>Doctor</option><option value='E'>Enfermera</option></select></td></table>";
              break;
      }          
    }
?>

