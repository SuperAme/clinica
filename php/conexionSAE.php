<?php
$host = 'C:\Program Files (x86)\Common Files\Aspel\Sistemas Aspel\SAE7.00\Ejemplos\Ejemplos.FDB';

//$host = 'C:\Users\bart_\Desktop\SAE70EMPRE03.FDB';
$username = "sysdba";
$password = "masterkey";

$gestor_db = ibase_connect($host,$username,$password,"UTF-8");



?>
