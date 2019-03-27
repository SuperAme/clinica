<?php
	require 'conexion.php';
	$hora = $_POST["hora"];
	$id = $_POST['id_cita'];
	$mysqli -> set_charset('utf8');
	$sql = "UPDATE citas SET tiempo_espera = '$hora' WHERE id = '$id'";
	if (mysqli_query($mysqli, $sql)) {
               echo "insert";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $mysqli->close();
?>