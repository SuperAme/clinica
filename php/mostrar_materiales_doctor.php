<?php
$host = 'C:\Program Files (x86)\Common Files\Aspel\Sistemas Aspel\SAE7.00\Ejemplos\Ejemplos.FDB';
$username = "sysdba";
$password = "masterkey";


$gestor_db = ibase_connect($host,$username,$password,"UTF8");

$s = $_POST['name'];
$sql = "SELECT DISTINCT(IV.CVE_ART),IV.DESCR,IV.LIN_PROD,IV.EXIST,PP.PRECIO AS PRECIO FROM INVE01 IV
                    LEFT JOIN PRECIO_X_PROD01 PP ON PP.CVE_ART = IV.CVE_ART
                     WHERE PP.CVE_PRECIO = 1 AND IV.CVE_ART = '$s'";
$gestor = ibase_query($gestor_db,$sql);
$row = ibase_fetch_object($gestor);

?>
<table class="table table-condensed" id = "tabla_modal">
    
    <tr>
        <td>CVE_ART</td>
        <td id = "cve_art"><?php echo $s;?></td>
    </tr>
    <tr>
        <td>DESCRIP</td>
        <td id = "descrip"><?php echo $row->DESCR?></td>
    </tr>
    <tr>
       <td>Observaciones</td>
       <td><input type="text" id = "obs"></td> 
    </tr>
    <tr>
        <td>Existencias</td>
        <td id = "exist"><?php echo $row->EXIST; ?></td>
    </tr>
    <tr>
        <td>Precio</td>
        <td><input type="text" id="precio" value=<?php echo $row->PRECIO;?>></td>
    </tr>
    <tr>
        <td>Precio Sugerido</td>
        <td><input type="text" id="precio_sug" value="<?php echo $row->PRECIO;?>" disabled></td>
    </tr>
    <tr>
        <td>Cantidad</td>
        <td><input type="text" class = "cant" id = "cant"></td>
    </tr>    
    <tr>
        <td>Subtotal</td>
        <td id = "sub">$0.00</td>
    </tr>
    <script type="text/javascript">
        var i = 0
        $(".cant").on('keyup',function(e){
            var t = document.getElementById("cant")
            var sub = document.getElementById("sub")
            var precio = document.getElementById("precio")
            var s = ""
            var exist = document.getElementById("exist")
            if(e.keyCode == 8){
                i = t.value.length
            }else{
                i++;
            }
            if(isNaN(parseInt(t.value)) && i != 0 && e.keyCode != 9 && parseInt(t.value) == "NaN"){
                alert("No se aceptan letras en el campo Cantidad")
            }else{
                var number = precio.value * t.value
                if(parseFloat(precio.value) % 1 != 0){
                    number = number * 1.16
                    s ="$" +  number.toString()
                    var r = s.split(".")
                    if(r[1].length > 2){
                        s = r[0] + "." + r[1][0] + r[1][1] + "$" + " con 16% de IVA"
                    }
                }else{

                    s ="$" +  number.toString() + ".00"
                }
                if(s.includes("NaN")){
                    alert("No se aceptan letras en el campo Cantidad")
                }else{
                   sub.innerHTML = s
                }
            }

        })
    </script>   
    
</table>
