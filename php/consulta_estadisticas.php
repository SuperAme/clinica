<?php
    require 'conexion.php';
    date_default_timezone_set("UTC");
    $fecha= date('Y-m-d');    
    $query = "SELECT * FROM citas WHERE estatus = 'Espera' and start like '%$fecha%'";

    $result = $mysqli->query($query);
    while($row=mysqli_fetch_array($result)){
        echo "<tr>".
        "<td>".$row['title']."</td>".
        "<td>".$row['hora_agr']."</td>".
        "<td>".$row['tiempo_espera']."</td>".
        "<td>".$row['start']."</td>".           
        "</tr>";
    }
?>
