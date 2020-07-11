
$(document).ready(function () {


    Swal.fire({
        title: "¿Quieres Comprar?",
        html: '<h4><strong> Primero debes de Iniciar Sesion </strong></h4>',
        icon: "warning",
        padding: '1rem',
        //timer: 5000,
        // timerProgressBar: true,
        position: 'center',
        grow: 'fullscreen',
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        stopKeydownPropagation: false
    });

    $("button").click(function () {
        document.location.href = "../LoginCliente.php";
    });


});
