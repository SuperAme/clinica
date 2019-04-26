jQuery(document).on('submit', '#Login', function(event){
     
    event.preventDefault();   
    jQuery.ajax({
        url: 'php/login.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){ 
            $('.botonlg').val('Validando');
    }
    }).done(function(respuesta){
        console.log(respuesta);        
        if(!respuesta.error){
            if(respuesta.tipo == 'D'){
                location.href = 'doctor.php';
            }else if(respuesta.tipo == 'R'){
                var date = new Date();
                var hour = date.getHours();
                var min = date.getMinutes();
                if (hour <= 7 || hour >= 21){
                    alert("Solo puedes consultar la agenda de 8 a.m. a 9 p.m.")
                }else{
                    location.href = 'recepcion.php'
                }
            }else if(respuesta.tipo == 'A'){                
                location.href = 'admin.php'
            }else if(respuesta.tipo == 'E'){
                var date = new Date();
                var hour = date.getHours();
                var min = date.getMinutes();
                if (hour <= 7 || hour >= 21){
                    alert("Solo puedes consultar la agenda de 8 a.m. a 9 p.m.")
                }else{
                    location.href = 'enfermera.php'
                }                
            }          
           }else{
               alert("Datos no válidos");
                /*$('.error').slideDown('slow');
               setTimeout(function(){
                   $('.error').slideUp('slow');
               },3000);*/
               $('.botonlg').val('Iniciar Sesión');
           }
    }).fail(function(resp){
        //console.log(resp.responseText);
    }).always(function(){
        //console.log("complete");
    });
    
});
