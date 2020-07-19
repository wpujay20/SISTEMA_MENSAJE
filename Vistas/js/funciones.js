
function agregaform(id_informe, id, nombre, rubro) {

    $('#id_informe').val(id_informe);
    $('#id').val(id);
    $('#nombre').val(nombre);
    $('#rubro').val(rubro); //el rubro es el ID

}
function ActualizarActividadesNormales() {

    id = $('#id').val();
    nombre = $('#nombre').val();
    rubro = $('#rubro').val(); //el rubro es el ID
    id_informe = $('#id_informe').val();

    if ((nombre === null && rubro === null) || (nombre === "" || rubro === "")) {
        alert("Rellene los datos por favor!.");
    } else {
//        alert(id_informe+" "+id + " " + nombre + " " + rubro);
        cadena = "id=" + id +
                "&nombre=" + nombre +
                "&id_rubro=" + rubro +
                "&id_informe=" + id_informe;
        $.ajax({
            type: "POST",
            url: "../CONTROLADOR/ColaboradorControlador.php?op=17",
            data: cadena,
            success: function (r) {
                if (r == 1) {

                } else {
                    id_informe = $('#id_informe').val();
                    document.location.href = "../CONTROLADOR/ColaboradorControlador.php?op=10&id_informe=" + id_informe + "";
                }
            }
        });

    }

}

function agregaformProducto(id_informe, id_act, id_rubro, nombreu, rubrou, titulou, autoru, estados_producto) {

    $('#id_informe').val(id_informe);
    $('#id_act').val(id_act);
    $('#id_rubro').val(id_rubro);
    $('#nombreu').val(nombreu);
    $('#rubrou').val(rubrou);
    $('#titulou').val(titulou);
    $('#autoru').val(autoru);
    $('#estadopro').val(estados_producto);
}
function ActualizarActividadConProducto() {


//    id_informe = $('#id_informe').val();
//    id_act = $('#id_act').val();
//    id_rubro = $('#id_rubro').val(); 
//    nombreu = $('#nombreu').val();
//    rubrou = $('#rubrou').val();
//    titulou = $('#titulou').val();
//    autoru = $('#autoru').val();  
//    estados_producto = $('#estados_producto').val();
//
//
//
//    if (nombreu==null || titulou==null ) {
//        alert("Rellene todos los datos por favor!");
//           alert(id_informe + " " + id_act + "  " + id_rubro + "  " + nombre + "  " + rubro + "  " + titulo + "  " + autor + "  " + estado);
//
////    }
//    id_informe = $('#id_informe').val();
//    id_act = $('#id_act').val();
//    id_rubro = $('#id_rubro').val();
//    nombreu = $('#nombreu').val();
//    rubrou = $('#rubrou').val();
//    titulou = $('#titulou').val();
//    autoru = $('#autoru').val();
//    estados_producto = $('#estados_producto').val();
//
//    alert(id_informe + " " + id_act + "  " + id_rubro + "  " + nombre + "  " + rubro + "  " + titulo + "  " + autor + "  " + estado);
//
//    if (nombreu == null && titulou == null) {
//        alert("Rellene todos los datos por favor!");
//
//    }



}
function ActualizarActividadesNormales2() {

    id_informe = $('#id_informe').val();
    id_act = $('#id_act').val();
    id_rubro = $('#id_rubro').val();
    nombreu = $('#nombreu').val();
    rubrou = $('#rubrou').val();
    titulou = $('#titulou').val();
    autoru = $('#autoru').val();
    estadopro = $('#estadopro').val(); 
    cadena = "id_informe=" + id_informe +
            "&id_act=" + id_act +
            "&id_rubro=" + id_rubro +
            "&nombreu=" + nombreu +
            "&titulou=" + titulou +
            "&autoru=" + autoru +
            "&estadopro=" + estadopro;
    
    
    

    $.ajax({
        type: "POST",
        url: "../CONTROLADOR/ColaboradorControlador.php?op=18",
        data: cadena,
        success: function (r) {
            if (r !==null) {              
                
                id_informe = $('#id_informe').val();
                document.location.href = "../CONTROLADOR/ColaboradorControlador.php?op=10&id_informe=" + id_informe + "";
               
                
            } else {
                alert("Error!");
            }
        }
    });



}




