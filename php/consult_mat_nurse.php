<?php
    require 'conexion.php';
    $mysqli -> set_charset('utf8');
    $paciente = $_POST['paciente'];
    $id_cita = $_POST['id'];
    if($nueva_consulta = $mysqli -> prepare("SELECT clave,descrip,obs,precio,cantidad FROM materiales WHERE paciente = ? AND id_cita = ?")){
        $nueva_consulta -> bind_param('si',$paciente,$id_cita);
        $nueva_consulta -> execute();
        $resultado = $nueva_consulta -> get_result();  
        echo json_encode($resultado->fetch_all());      
        $nueva_consulta -> close();
    }

$mysqli -> close();
?>