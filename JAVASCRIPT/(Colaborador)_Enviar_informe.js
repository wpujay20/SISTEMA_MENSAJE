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
  title: '¿Estas Seguro que quieres Enviar el Informe a Jefatura?',
  text: "Esta accion no se puede remover",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Si, quiero hacerlo',
  cancelButtonText: 'No, Cancelar!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {     /* En caso se eliga si quiero borraralo */
    swalWithBootstrapButtons.fire(
      'Enviado!',
      'El informe ha sido enviado',
      'correctamente'
    );

   $("button").click(function () {
            document.location.href="ColaboradorControlador.php?op=8&msj=2"; 
    });
    
  }else if (
    /* En caso se eliga no quiero borraralo */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelado',
      'Tu informe no ha sido enviado',
      
    );
   $("button").click(function () {
            document.location.href="UsuariosControlador.php?op=1";
    });
   }
});
});
    