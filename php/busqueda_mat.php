<?php 
require 'conexionSAE.php';
$a = $_POST["hola"];
$list = array();
  if($gestor_db == true) {
    $sql = "SELECT DISTINCT(IV.CVE_ART) AS CLAVE, IV.DESCR AS DESCRIP FROM INVE01 IV
        LEFT JOIN PRECIO_X_PROD01 PP ON PP.CVE_ART = IV.CVE_ART
         WHERE PP.CVE_PRECIO = 1";
        //echo $sql;
    $gestor_sent = ibase_query($gestor_db, $sql);
    $coln = ibase_num_fields($gestor_sent);
    while($row = ibase_fetch_object($gestor_sent)){
        array_push($list,$row);
    }
    echo json_encode($list);

    }
?>