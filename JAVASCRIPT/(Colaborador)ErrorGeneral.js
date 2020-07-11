$(document).ready(function () {

 
        Swal.fire({
            title: "Lo Sentimos",
            html: '<h4><strong> No se pudo completar la acción </strong></h4>',
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
            document.location.href="UsuariosControlador.php?op=1";
    });


});