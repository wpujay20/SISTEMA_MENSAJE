$(document).ready(function () {

 
        Swal.fire({
            title: "Lo sentimos",
            html: '<h4><strong> Debe seleccionar minimo 1 informe </strong></h4>',
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
            document.location.href="../CONTROLADOR/Jefe_Controlador.php?op=3";
    });
    
});