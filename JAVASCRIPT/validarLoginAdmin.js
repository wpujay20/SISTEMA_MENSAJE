
$(document).ready(function() {
    
    
    $("#form").validate({
            
            rules:{
                
                el_email:{
                    email:true,
                    required:true
                },
                pass1:{
                    required:true,
                    rangelength:[8,16]
                }
            },
            
            messages:{

                el_email:{
                    email:"Debe de tener @ y un punto",
                    required:"El correo es obligatorio"
                },

                 pass1:{
                    required:"La contraseña es obligatoria",
                    rangelength:"La contraseña deber de ser de 8 a 16 caracteres"
                }
            }
            
        });
        
     
}); 
