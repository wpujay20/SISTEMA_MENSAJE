
$(document).ready(function () {

 
        Swal.fire({
            title: "Perfecto",
            html: '<h4><strong> Te has registrado correctamente. Ya puedes Loguearte </strong></h4>',
            icon: "success",
            padding: '1rem',
            //timer: 5000,
            //timerProgressBar: true,
            position: 'center',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false
        });
        
        $("button").click(function () {
            document.location.href="../LoginCliente.php";
    });


});

