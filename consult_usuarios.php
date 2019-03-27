<?php  
	require 'php/conexion.php';
	header('Content-Type: application/json');
	$mysqli -> set_charset('utf8');
	
	if($nueva_consulta = $mysqli -> query("SELECT * FROM usuarios")){
		$resultado = $nueva_consulta ->fetch_all();
		echo json_encode($resultado);
	}
?>