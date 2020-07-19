
function agregaform(id_informe, id, nombre, rubro) {

    $('#id_informe').val(id_informe);
    $('#id').val(id);
    $('#nombre').val(nombre);
    $('#rubro').val(rubro); //el rubro es el ID

}
function ActualizarActividadesNormales() {

    var id = $('#id').val();
    var nombre = $('#nombre').val();
    var rubro = $('#rubro').val(); //el rubro es el ID
    var id_informe = $('#id_informe').val();

    if (isBlank(nombre) === true || isBlank(rubro) === true) {
        Swal.fire({
            title: "¡Error!",
            html: '<h4><strong> Rellene todos los campos por favor </strong></h4>',
            icon: "error",
            padding: '1rem',
            timer: 5000,
            //timerProgressBar: true,
            position: 'center',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false
        });
    } else {
        cadena = "id=" + id +
                "&nombre=" + nombre +
                "&id_rubro=" + rubro +
                "&id_informe=" + id_informe;
        $.ajax({
            type: "POST",
            url: "../CONTROLADOR/ColaboradorControlador.php?op=17",
            data: cadena,
            success: function (r) {
                if (isBlank(r)===false) {
                    id_informe = $('#id_informe').val();
                    document.location.href = "../CONTROLADOR/ColaboradorControlador.php?op=10&id_informe=" + id_informe + "";

                    Swal.fire({
                        title: "Perfecto!",
                        html: '<h4><strong> ¡Actividad Actualizada! </strong></h4>',
                        icon: "success",
                        padding: '2rem',
                        timer: 10000,
                        timerProgressBar: true,
                        position: 'center',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        stopKeydownPropagation: false
                    });

                } else {
                    Swal.fire({
                        title: "¡Error de Servidor!",                        
                        icon: "error",
                        padding: '1rem',
                        timer: 5000,
                        //timerProgressBar: true,
                        position: 'center',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false
                    });

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

//Función para validar datos de modificación
function isBlank(str) {
    return (!str || /^\s*$/.test(str));
}


function ActualizarActividadesNormales2() {

    var id_informe = $('#id_informe').val();
    var id_act = $('#id_act').val();
    var id_rubro = $('#id_rubro').val();
    var nombreu = $('#nombreu').val();
//    var rubrou = $('#rubrou').val();
    var titulou = $('#titulou').val();
    var autoru = $('#autoru').val();
    var estadopro = $('#estadopro').val();


    if (isBlank(nombreu) === true || isBlank(titulou) === true || isBlank(autoru) === true || isBlank(estadopro) === true) {
        Swal.fire({
            title: "¡Error!",
            html: '<h4><strong> Rellene todos los campos por favor </strong></h4>',
            icon: "error",
            padding: '1rem',
            timer: 5000,
            //timerProgressBar: true,
            position: 'center',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false
        });
        return false;
    } else {

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
                if (isBlank(r)===false) {

                    id_informe = $('#id_informe').val();
                    document.location.href = "../CONTROLADOR/ColaboradorControlador.php?op=10&id_informe=" + id_informe + "";

                    Swal.fire({
                        title: "Perfecto!",
                        html: '<h4><strong> ¡Actividad Actualizada! </strong></h4>',
                        icon: "success",
                        padding: '2rem',
                        timer: 10000,
                        timerProgressBar: true,
                        position: 'center',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        stopKeydownPropagation: false
                    });

                } else {
                    alert("Error!");
                }
            }
        });
    }



}




