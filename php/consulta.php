<?php
	require 'conexion.php';
    
    $paciente = $_POST['paciente'];
    $doctor = $_POST['doctor'];
    $servicio = $_POST['servicio'];
    $cubiculo = $_POST['cubiculo'];
    $fecha = $_POST['fecha'];
    $horaini = $_POST['horaini'];
    $horafin = $_POST['horafin'];

	$mysqli -> set_charset('utf8');
	 $sql = "INSERT INTO citas(paciente,doctor,servicio,cubiculo,fecha,hora_inicial,hora_final)VALUES ('$paciente','$doctor','$servicio','$cubiculo','$fecha','$horaini','$horafin')";

            if (mysqli_query($mysqli, $sql)) {
               echo "insert";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $mysqli->close();
	#$data['ready'] = "ready";
	#echo json_encode($data);
?>



                