<?php 
    require 'php/conexion.php';
    require 'php/conexionSAE.php';
    $id = $_POST['id'];
    $servicio = $_POST['servicio'];
    $hora = $_POST['hora'];
    echo $hora;
    
    $sql = "SELECT  IC.CAMPLIB1 AS DURACION FROM INVE01 IV
                LEFT JOIN INVE_CLIB01 IC ON IC.CVE_PROD = IV.CVE_ART
                WHERE IV.DESCR = '$servicio'";
    
    $gestor = ibase_query($gestor_db,$sql);
    $row = ibase_fetch_object($gestor);    
    $duracionServicio =  $row->DURACION;

    //$sql = "INSERT INTO tiempoconsulta(id,idCita,duracion,tiempo)VALUES ('','$id','$duracionServicio',)";
    
?>

