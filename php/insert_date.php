<?php
	require 'conexion.php';
    
    $date = $_POST["date"];

	$mysqli -> set_charset('utf8');
    if($nueva_consulta = $mysqli -> prepare("SELECT * FROM usuarios WHERE nombre_usuario = ? AND nombre = ?")){
        $nueva_consulta -> bind_param('ss',$usuario,$nombre);
        $nueva_consulta -> execute();
        $resultado = $nueva_consulta -> get_result();  
        //echo json_encode($resultado->fetch_all());
        if($resultado -> num_rows > 0){
            echo "not_insert";
        }else{
         $sql = "INSERT INTO usuarios(nombre_usuario,contraseña,nombre,apellidoM,apellidoP,rfc,correo,telefono1,telefono2,tipo,direccion,colonia,numero_exterior,numero_interior,delegacion,estado,codigo_postal)VALUES ('$usuario','$contrase','$nombre','$apellidoM','$apellidoP','$rfc','$correo','$telefono1','$telefono2','$tipo','$calle','$colonia','$numeroE','$numeroI','$deleg','$estado','$codigo')";

            if (mysqli_query($mysqli, $sql)) {
               echo "insert";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $mysqli->close();   
        }
        $nueva_consulta -> close();
    }
	 
	#$data['ready'] = "ready";
	#echo json_encode($data);
?>