<?php
	require 'conexion.php';
	$mysqli -> set_charset('utf8'); 
	$paciente = $_POST['paciente'];
	$id = $_POST['id'];

	foreach($_POST['keyProds'] as $key=>$value){
		$cveArt = $value['0']; //echo $cveArt;   
		$name = $value['1'];    
        $cant = $value['4'];    //echo $cant;
        $precio = $value['3']; //echo $precio;
        $subt = $value['5'];    
        $ObsProd = $value['2'];
        
        $sql = "INSERT INTO materiales(clave,descrip,obs,precio,precio_sug,cantidad,subtotal,id_cita,paciente) VALUES ('$cveArt','$name','$ObsProd',$precio,$precio,$cant,$subt,$id,'$paciente')";
       	if (mysqli_query($mysqli, $sql)) {
               echo "insert";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            
	}
	$mysqli->close();
?>