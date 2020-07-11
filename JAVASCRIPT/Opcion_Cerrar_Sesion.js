
$(document).ready(function () {
    
    
$("#cerrar").click(function () {
            Swal.fire({
            title: "Cerrar la Sesion",
            html: '<h4><strong> ¿Estas Seguro? </strong></h4>',
            icon: "question",
            padding: '1rem',
            timer: 10000,
            timerProgressBar: true,
            position: 'center'
            
        });
        
        $("button").click(function () {
            window.location.href="../CONTROLADOR/Controlador_Sesiones.php";
            });
    });
});


