<?php
    require 'conexion.php';
    sleep(2);
    $mysqli -> set_charset('utf8');
    $usuario = $mysqli -> real_escape_string($_POST['user']);
    if($nueva_consulta = $mysqli -> prepare("SELECT * FROM usuarios WHERE nombre_usuario = ?")){
        $nueva_consulta -> bind_param('s',$usuario);
        $nueva_consulta -> execute();
        $resultado = $nueva_consulta -> get_result();  
        echo json_encode($resultado->fetch_all());      
        $nueva_consulta -> close();
    }

$mysqli -> close();
?>