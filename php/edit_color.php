<?php
	require 'conexion.php';
	 
	$color = $_POST["color"];
	$id = $_POST['id'];
	$mysqli -> set_charset('utf8');
	$sql = "UPDATE citas SET color = '$color' WHERE id = '$id'";
	if (mysqli_query($mysqli, $sql)) {
               echo "insert";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $mysqli->close();
?>