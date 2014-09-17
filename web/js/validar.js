$(document).ready(function(){
       $('#clientef').validate({
           rules:{
               nombre:{required:true,},
               apellidos:{required:true,},
               email:{required:true,},
               usuario:{required:true,minlength: 2,},
               contraseña:{required:true,minlength: 4,},
               confirmcontraseña:{required:true,minlength: 4,equalTo:"#contraseña",},
               telefono:{required:true,minlength: 6,},
               movil:{required:true,minlength: 9,digits: true,},
               direccion:{required:true,},
               ciudad:{required:true,},
               pais:{required:true,},
               dni:{required:true,minlength: 8,digits: true,}
           },
           messages:{
               nombre:{required:"Ingresa tu nombre",},
               apellidos:{required:"Ingresa tu apellidos",},
               email:{required:"Ingresa tu email",},
               usuario:{required:"Ingresa tu usuario",},
               contraseña:{required:"Ingresa tu contraseña",},
               confirmcontraseña:{required: "Confirme su Contraseña",minlength: "Minimo 4 caracteres",
                   equalTo: "No coincide con la contraseña"},
               telefono:{required:"Ingresa tu telefono",},
               movil:{required:"Ingresa tu movil",digits:"Solo numeros"},
               direccion:{required:"Ingresa tu direccion",},
               ciudad:{required:"Ingresa tu cuidad",},
               pais:{required:"Ingresa tu pais",},
               dni:{required:"Ingresa tu dni",digits:"Solo numeros"}
               
           },
           highlight: function(element) {$(element).closest('.control-group').removeClass('success').addClass('error');},
	    success: function(element) {element.text('OK!').addClass('valid').closest('.control-group').removeClass('error').addClass('success');}
       }) ;
       $('#productof').validate({
           rules:{
               imagen:{required:true,},
               nombre:{required:true,},
               descripcion:{required:true,},
               caracter:{required:true,},
               precio:{required:true,},
               stock:{required:true,digits: true,},
               activado:{required:true,digits: true,min: 0,max: 1},
               
           },
           messages:{
               imagen:{required:"Ingrese Imagen",},
               nombre:{required:"Ingrese Nombre",},
               descripcion:{required:"Ingrese Descripcion",},
               caracter:{required:"Ingrese Cracterísticas",},
               precio:{required:"Ingrese Precio",},
               stock:{required:"Ingrese Stock",digits: "Solo numeros",},
               activado:{required:"Ingrese Estado",digits: "Solo numeros",min:"Solo 0 o 1",max: "Solo 0 o 1",},
               
           },
           highlight: function(element) {$(element).closest('.control-group').removeClass('success').addClass('error');},
	    success: function(element) {element.text('OK!').addClass('valid').closest('.control-group').removeClass('error').addClass('success');}
       }) ;
       
    });
    
