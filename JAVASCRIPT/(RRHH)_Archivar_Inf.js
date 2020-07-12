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
  title: '¿Estas Seguro que quieres Archivar este Informe?',
  text: "Esta accion no se puede remover",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Si, quiero hacerlo',
  cancelButtonText: 'No, Cancelar!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {     /* En caso se eliga si quiero borraralo */
    swalWithBootstrapButtons.fire(
      'Archivado!',
      'El informe ha sido Archivado',
      'correctamente'
    );

   $("button").click(function () {
            document.location.href="RRHH_Controlador.php?op=2&msj=2"; 
    });
    
  }else if (
    /* En caso se eliga no quiero borraralo */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelado',
      'Tu informe no ha sido Archivado',
      
    );
   $("button").click(function () {
            document.location.href="UsuariosControlador.php?op=3";
    });
   }
});
});
    