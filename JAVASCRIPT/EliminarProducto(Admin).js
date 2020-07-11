$("document").ready(function () {

    
const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger',
    padding: '3rem'
  },
  buttonsStyling: false
});

swalWithBootstrapButtons.fire({
  title: '¿Estas Seguro?',
  text: "Esta accion no se puede remover",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Si, quiero Borrarlo',
  cancelButtonText: 'No, Cancelar!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {     /* En caso se eliga si quiero borraralo */
    swalWithBootstrapButtons.fire(
      'Borrado!',
      'El registro ha sido borrado',
      'correctamente'
    );

   $("button").click(function () {
            document.location.href="../CONTROLADOR/Mantenimiento_controlador.php?op=9";
    });
    
  }else if (
    /* En caso se eliga no quiero borraralo */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelado',
      'Tu registro no ha sido modificado',
      
    );
   $("button").click(function () {
            document.location.href="../CONTROLADOR/Mantenimiento_controlador.php?op=3";
    });
   }
});
});
    
    
    
    
/*   
$("#prueba").on("click", function(e) {
           e.preventDefault();
           swal.fire({
             title: "Are you sure?",
             text: "You will not be able to open  your account!",
             type: "warning",
             showCancelButton: true,
             confirmButtonColor: "#DD6B55",
             confirmButtonText: "Yes, close my account!",
             closeOnConfirm: false
           },
           function(){
             window.location.href="<?php echo base_url().'users/close_account' ?>";
           });
       });




/*
    
$("#aea").click(function () {
            Swal.fire({
            title: "Eliminar Producto",
            html: '<h4><strong> ¿Estas Seguro? </strong></h4>',
            icon: "error",
            padding: '1rem',
            timer: 10000,
            timerProgressBar: true,
            position: 'center'
            
        });

        $("button").click(function () {
            window.location.href="../../CONTROLADOR/Mantenimiento_controlador.php";
            });
    });
*/




