<?php 
    require 'php/conexion.php';
    require 'php/conexionSAE.php';
    $id = $_POST['id'];
    $servicio = $_POST['servicio'];
    $hora = $_POST['hora'];
    //echo $hora."<br/>";
    
    $sql = "SELECT  IC.CAMPLIB1 AS DURACION FROM INVE01 IV
                LEFT JOIN INVE_CLIB01 IC ON IC.CVE_PROD = IV.CVE_ART
                WHERE IV.DESCR = '$servicio'";    
    
    $gestor = ibase_query($gestor_db,$sql);
    $row = ibase_fetch_object($gestor);    
    $duracionServicio =  $row->DURACION;

    $segundosHi = strtotime($hora);
    $segundosMa = $duracionServicio*60;    

    $nueva = date("H:i",$segundosHi+$segundosMa);
    echo $nueva, "\n";

    $mysqli -> set_charset('utf-8');
    $sql = "INSERT INTO tiempoconsulta(id,idCita,duracion_servicio,hora_inicio, hora_fin)VALUES ('','$id','$duracionServicio','$hora','$nueva')";
    if (mysqli_query($mysqli, $sql)) {
        echo "insert";
     } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
     }
     $mysqli->close();
    
    /*$mysqli -> set_charset('utf8');
    if($nueva_consulta = $mysqli -> prepare("SELECT * FROM tiempoconsulta WHERE nombre_usuario = ?")){
        $nueva_consulta -> bind_param('s',$usuario);
        $nueva_consulta -> execute();
        $resultado = $nueva_consulta -> get_result();  
        //echo json_encode($resultado->fetch_all());
        if($resultado -> num_rows > 0){
            echo "not_insert";
        }else{
         $sql = "INSERT INTO usuarios(nombre_usuario,contraseña,nombre,apellidoM,apellidoP,rfc,correo,telefono1,telefono2,tipo,direccion,colonia,numero_exterior,numero_interior,delegacion,estado,codigo_postal,comision)VALUES ('$usuario','$contrase','$nombre','$apellidoM','$apellidoP','$rfc','$correo','$telefono1','$telefono2','$tipo','$calle','$colonia','$numeroE','$numeroI','$deleg','$estado','$codigo','$comision')";

            if (mysqli_query($mysqli, $sql)) {
               echo "insert";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $mysqli->close();   
        }
        $nueva_consulta -> close();
    }*/

?>

