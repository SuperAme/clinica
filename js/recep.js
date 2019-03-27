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
            r = document.getElementById('header_recep')      
           }else{
               alert("Datos no válidos");
                /*$('.error').slideDown('slow');
               setTimeout(function(){
                   $('.error').slideUp('slow');
               },3000);*/
               $('.botonlg').val('Iniciar Sesión');
           }
    }).fail(function(resp){
        console.log(resp.responseText);
    }).always(function(){
        console.log("complete");
    });   
});



