<?php
	require 'conexion.php';
    
    $usuario = $_POST['usuario'];
    $contrase = $_POST['contraseña'];
    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $rfc = $_POST['rfc'];
    $correo = $_POST['correo'];
    $telefono1 = $_POST['telefono1'];
    $telefono2 = $_POST['telefono2'];
    $calle = $_POST['calle'];
    $colonia = $_POST['colonia'];
    $numeroE = $_POST['ne'];
    $numeroI = $_POST['ni'];
    $deleg = $_POST['deleg'];
    $estado = $_POST['estado'];
    $codigo = $_POST['codigo'];
    $tipo = $_POST['tipo'];
    $comision = $_POST['comision'];

	$mysqli -> set_charset('utf8');
    if($nueva_consulta = $mysqli -> prepare("SELECT * FROM usuarios WHERE nombre_usuario = ?")){
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
    }
	 
	#$data['ready'] = "ready";
	#echo json_encode($data);
?>



                