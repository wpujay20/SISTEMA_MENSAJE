
$(document).ready(function() {
	$("#formInsertar").validate({
            
            rules:{
                nombre:"required",
                apellido:"required",
                usuario:"required",
                e_mail:{
                    email:true,
                    required:true
                },
                dni:{
                    required: true,
                    digits: true,
                    rangelength:[1,8]
                },
                
                pass1:{
                    required:true,
                    rangelength:[4,10]
                },
                pass2:{
                    required:true,
                    equalTo:"#pass1"
                }
                
            },
            
            messages:{
                nombre:"Por favor Rellena el nombre",
                apellido:"Por favor Rellena el apellido",
                usuario:"Por favor Rellena el nombre de usuario",
                
                dni:{
                    required:"Por favor Relllena el DNI",
                    digits:"Solo datos Numericos",
                    rangelength:"Solo 8 numeros tiene un DNI"
                },
                
               
                 pass1:{
                    required:"La contraseña es obligatoria",
                    rangelength:"La contraseña deber de ser de 4 a 10 caracteres"
                },
                pass2:{
                    required:"La contraseña es obligatoria",
                    equalTo:"Las contraseñas no coinciden"
                }
                
                  
                
            }
            
        });
}); 
