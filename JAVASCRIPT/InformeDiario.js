$(document).ready(function () {

 
        Swal.fire({
            title: "Lo Sentimos",
            html: '<h4><strong> Solo 1 envio de informe por semana </strong></h4>',
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
            document.location.href="../Vistas/InterfaceJefe.php";
    });
    
});
