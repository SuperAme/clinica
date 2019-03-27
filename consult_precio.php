<?php
$host = 'C:\Program Files (x86)\Common Files\Aspel\Sistemas Aspel\SAE7.00\Ejemplos\Ejemplos.FDB';
//$host = 'C:\Users\bart_\Desktop\SAE70EMPRE03.FDB';
$username = "sysdba";
$password = "masterkey";
$r = $_POST['name'];

$gestor_db = ibase_connect($host,$username,$password,"UTF-8");
if($gestor_db == true) {
    $sql = "SELECT PP.PRECIO AS PRECIO FROM INVE01 IV LEFT JOIN PRECIO_X_PROD01 PP ON PP.CVE_ART = IV.CVE_ART WHERE IV.DESCR = '$r' AND PP.CVE_PRECIO = 1";
    $gestor_sent = ibase_query($gestor_db, $sql);
    $coln = ibase_num_fields($gestor_sent);

    $row = ibase_fetch_object($gestor_sent);
    $data["0"] = $row->PRECIO;
    echo json_encode($data);
}
?>