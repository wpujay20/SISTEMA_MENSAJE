
$(document).ready(function () {


    Swal.fire({
        title: "Correcto",
        html: '<h4><strong> ¡Colaborador Registrado Correctamente! </strong></h4>',
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
