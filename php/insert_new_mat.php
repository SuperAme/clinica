<?php
	require 'conexion.php';
	$mysqli -> set_charset('utf8'); 
	$paciente = $_POST['paciente'];
	$id = $_POST['id'];

  $query = "DELETE FROM materiales WHERE id_cita = '$id'";
  echo $query;
  if(mysqli_query($mysqli,$query)){
    foreach($_POST['keyProds'] as $key=>$value){
    $cveArt = $value['0']; //echo $cveArt;   
    $name = $value['1'];    
        $precio_sug = $value['4'];    //echo $precio_sug;
        $precio = $value['3']; //echo $precio;
        $cant = $value['5'];    
        $ObsProd = $value['2'];
        $subt = $value['6'];
        
        $sql = "INSERT INTO materiales(clave,descrip,obs,precio,precio_sug,cantidad,subtotal,id_cita,paciente) VALUES ('$cveArt','$name','$ObsProd',$precio,$precio_sug,$cant,$subt,$id,'$paciente')";
        if (mysqli_query($mysqli, $sql)) {
               echo "insert";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            
  }
}else{
  echo "Error";
}

	
	$mysqli->close();
?>