$(document).ready(function () {


    Swal.fire({
        title: "Listo",
        html: '<h4><strong> Enviado Correctamente </strong></h4>',
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
        document.location.href = "../CONTROLADOR/Jefe_Controlador.php?op=3";
    });
    

});
