<?php
	require 'conexion.php';
    
    $fecha = $_POST['fecha'];
    $id = $_POST['id'];

	$mysqli -> set_charset('utf8');
	 $sql = "UPDATE citas SET end = '$fecha' WHERE id = '$id'";

            if (mysqli_query($mysqli, $sql)) {
               echo "insert";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $mysqli->close();
	#$data['ready'] = "ready";
	#echo json_encode($data);
?>