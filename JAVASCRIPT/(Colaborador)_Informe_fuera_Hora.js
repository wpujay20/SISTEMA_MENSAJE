$(document).ready(function () {


    Swal.fire({
        title: "Lo Sentimos :(",
        html: '<h4><strong> La hora de envío de su informe expiró <br><font style="color:red"> Limite: Viernes 8:00 pm<font>  </strong></h4>',
        icon: "error",
        padding: '1rem',
        //timer: 5000,
        //timerProgressBar: true,
        position: 'center',
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false
    });

    $("button").click(function () {
        document.location.href = "UsuariosControlador.php?op=1";
    });


});