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
  title: '¿Estas Seguro que quieres borrar el Informe y sus actividades?',
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
            document.location.href="../CONTROLADOR/ColaboradorControlador.php?op=5";
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
            document.location.href="../Vistas/(Colaborador)_LLenar_Actividades.php";
    });
   }
});
});
    