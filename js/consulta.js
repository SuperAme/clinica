$(document).ready(function(){
    
    $.ajax({
        url: 'php/consulta_estadisticas.php',
        type: 'GET',
        dataType: 'html',
        /*dataType: 'html',*/  
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve            
            $(".listc").html(response)
        },
        error: function(){
            console.log("error")
        }
    })
})