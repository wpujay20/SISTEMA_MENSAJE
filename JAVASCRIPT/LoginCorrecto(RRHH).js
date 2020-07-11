
$(document).ready(function () {


    Swal.fire({
        title: "Bienvenido",
        html: '<h4><strong> Te logeaste correctamente </strong></h4>',
        icon: "success",
        padding: '1rem',
        //timer: 5000,
        //timerProgressBar: true,
        position: 'center',
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        stopKeydownPropagation: false
    });

    $("button").click(function () {
        document.location.href = "../CONTROLADOR/UsuariosControlador.php?op=3";
    });


});
