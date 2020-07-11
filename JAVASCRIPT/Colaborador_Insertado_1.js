
$(document).ready(function () {


    Swal.fire({
        title: "Te has Registrado Correctamente",
        html: '<h4><strong> ¡Ya puedes Loguearte! </strong></h4>',
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
        document.location.href = "../index.php";
    });


});
