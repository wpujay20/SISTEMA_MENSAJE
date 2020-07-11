
$(document).ready(function () {
    
//PRIMERO OCULTAREMOS LOS DIVS DE LOS FORMULARIOS, MAS NO LOS CHECKBOX
    $("#bloque_productos").addClass("Ocultar_div");
    $("#bloque_rubros_personalizados").addClass("Ocultar_div");

    $("#si").click(function () {
        //AQUI OCULTAMOS EL BLOQUE DE PRODUCTOS, EL CHECKBOX DE RUBRO PERSONALIZADO
        // Y EL INPUT DE SELECCION DE RUBROS PREPARADOS DE LA BD (3 CAMPOS)
        $("#bloque_productos").toggleClass("Ocultar_div");
        $("#contenedor_de_checkbox").toggleClass("Ocultar_div");
        $("#rubros").toggleClass("Ocultar_div");
        
        
    });
    
    $("#rubro_nuevo").click(function () {
         //AQUI OCULTAMOS EL BLOQUE DE RUBROS PERSONALIZADOS, EL CHECKBOX DE PRODUCTOS
         // Y EL INPUT DE SELECCION DE RUBROS PREPARADOS DE LA BD (3 CAMPOS)
        $("#bloque_rubros_personalizados").toggleClass("Ocultar_div");
        $("#contenedor_de_checkbox_pro").toggleClass("Ocultar_div");
        $("#rubros").toggleClass("Ocultar_div");

     
    });
  
    
 
    

});
