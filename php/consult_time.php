<?php
    require 'conexion.php';
    $mysqli -> set_charset('utf8');
    $hola = $_POST["message"];
    if($nueva_consulta = $mysqli -> prepare("SELECT id,start,tiempo_espera FROM citas")){
        $nueva_consulta -> execute();
        $resultado = $nueva_consulta -> get_result();  
        echo json_encode($resultado->fetch_all());      
        $nueva_consulta -> close();
    }

$mysqli -> close();
?>