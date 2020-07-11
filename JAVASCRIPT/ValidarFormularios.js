
$(document).ready(function() {
	$("#form").validate({
            
            rules:{
                nombre:"required",
                apellido:"required",
                Direccion:"required",
                e_mail:{
                    email:true,
                    required:true
                },
                el_dni:{
                    required: true,
                    digits: true,
                    rangelength:[1,8]
                },
                numero_cel:{
                    required:true,
                    digits: true
                },
                pass1:{
                    required:true,
                    rangelength:[8,16]
                },
                pass2:{
                    required:true,
                    equalTo:"#pass1"
                }
                
            },
            
            messages:{
                nombre:"Por favor Rellena el nombre",
                apellido:"Por favor Rellena el apellido",

                e_mail:{
                    email:"Debe de tener @ y un punto",
                    required:"El correo es obligatorio"
                },
                el_dni:{
                    required:"Por favor Relllena el DNI",
                    digits:"Solo datos Numericos",
                    rangelength:"Solo 8 numeros tiene un DNI"
                },
                 numero_cel:{
                    required:"Por favor Relllena el telefono",
                    digits:"Solo datos Numericos"
                },
                Direccion:"Por favor rellene la direccion",
                
                 pass1:{
                    required:"La contraseña es obligatoria",
                    rangelength:"La contraseña deber de ser de 8 a 16 caracteres"
                },
                pass2:{
                    required:"La contraseña es obligatoria",
                    equalTo:"Las contraseñas no coinciden"
                }
                
                  
                
            }
            
        });
}); 
