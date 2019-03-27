<?php
$host = 'C:\Program Files (x86)\Common Files\Aspel\Sistemas Aspel\SAE7.00\Ejemplos\Ejemplos.FDB';
//$host = 'C:\Users\bart_\Desktop\SAE70EMPRE03.FDB';
$username = "sysdba";
$password = "masterkey";
$r = $_POST['nombre'];

$gestor_db = ibase_connect($host,$username,$password,"UTF-8");
if($gestor_db == true) {
    $sql = "SELECT CLI.NOMBRE FROM CONTAC01 CO 
LEFT JOIN CLIE01 CLI ON  CO.CVE_CLIE = CLI.CLAVE WHERE CO.NOMBRE = '$r';";
    $gestor_sent = ibase_query($gestor_db, $sql);
    $coln = ibase_num_fields($gestor_sent);

    $row = ibase_fetch_object($gestor_sent);
    $data["0"] = $row->NOMBRE;
    echo json_encode($data);
}
?>