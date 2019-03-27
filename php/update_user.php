<?php
	require 'conexion.php';
    
    $id = $_POST['identify'];
    $name = $_POST['name'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $type = $_POST['type'];
    $comision = $_POST['comision'];

	$mysqli -> set_charset('utf8');
	 $sql = "UPDATE usuarios SET nombre = '$name',  nombre_usuario = '$user', tipo = '$type', contraseña = '$pass', comision = '$comision' WHERE id = '$id'";

            if (mysqli_query($mysqli, $sql)) {
               echo "insert";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $mysqli->close();
	#$data['ready'] = "ready";
	#echo json_encode($data);
?>