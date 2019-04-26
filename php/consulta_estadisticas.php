<?php

$valor = $mysqli->real_escape_string($_POST['valor']);
$query = "SELECT * FROM citas WHERE estatus = 'consulta'";
$result = $mysqli->query($query);
while($row=mysqli_fetch_array($result)){
    echo "<tr>".
    "<td>".$row['id']."</td>".
    "<td>".$row['tipo']."</td>".
    "<td>".$row['propietario']."</td>".
    "<td>".$row['precio']."</td>".
    "<td>".$row['recamaras']."</td>".
    "<td>".$row['modalidad']."</td>".
    "<td>".$row['pais']."</td>".
    "<td>".$row['estado']."</td>".            
    "</tr>";
}

?>