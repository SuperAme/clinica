<?php
	require 'conexion.php';
    
    $fecha = $_POST['fecha'];
    $paciente = $_POST['nombre'];
    $id = $_POST['id'];

	$mysqli -> set_charset('utf8');
	 $sql = "UPDATE citas SET paciente = '$paciente', fecha = '$fecha' WHERE id_cita = '$id'";

            if (mysqli_query($mysqli, $sql)) {
               echo "insert";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $mysqli->close();
	#$data['ready'] = "ready";
	#echo json_encode($data);
?>



                