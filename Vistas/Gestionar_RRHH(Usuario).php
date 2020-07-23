<?php
if (!isset($_SESSION)) {
    session_start();
    $lista = $_SESSION["GESTIONAR_USUARIO"];
      
   
}
 //var_dump($lista);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title> Categoria Producto </title>

        <!-- REQUERIDO PARA EL DATA TABLE -->

        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../datatables/main.css">  
        <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
        <link rel="stylesheet"  type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

      <!-- REQUERIDO PARA EL EL SLIDER -->
      <link rel="stylesheet"  type="text/css" href="../CSS/menu_mantenimientos.css">



    </head>

    <body > 
        <header>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               
            </div>
            <br>
           
        </header>   
        <!-----------------------------------------------------------------ZONA SLIDER----------------------------------------------------------------->

    
        <div style="height:50px"></div>
    <center><h3>Gestionar Usuarios</h3> </center>
    


    <br>  
        
    <!-----------------------------------------------------------------Ejemplo tabla con DataTables----------------------------------------------------------------->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form name="form" method="POST" action="RegistrarUsuario.php">
                    <div class="table-responsive">  
                          <a href="InterfaceRRHH.php" class="btn btn-danger">Regresar Menu principal</a> <br><br>
                        <table   style="font-size: small" id="example" class="table table-striped table-bordered" style="width:100%">

                            <thead>
                            <th> trabajador</th>
                            <th>nombre</th>
                            <th>apellido</th>
                            <th>dni</th>
                            <th>Tipousuario</th>
                            <th>usuario nombre</th>
                            <th>contraseña</th>
                            <th>descripcion</th>
                          <th>estado</th>
                           <th>Modificar</th>
                                 


                            </thead> 
                            <tbody>
                                
                                <?php
                                foreach ($lista as $persona) {
                                    ?>                
                                    <tr>
                                        <td><?php echo $persona['id_trabajador']; ?></td>
                                        <td><?php echo $persona['nombre']; ?></td>
                                        <td><?php echo $persona['apellido']; ?></td>
                                        <td><?php echo $persona['dni']; ?></td>
                                         <td><?php echo $persona['tipo_nombre']; ?></td>
                                         <td><?php echo $persona['usu_nombre']; ?></td>
                                        <td><?php echo $persona['usu_contra']; ?></td>
                                        <td><?php echo $persona['tipo_descripcion']; ?></td>
                                        
                                        <?php if($persona['estado']=='habilitado'){ ?>
                                        <td><a class="btn btn-info" href="../CONTROLADOR/GestionarUsuario.php?op=6&usu=<?php echo $persona['id_usu']; ?>" ><?php echo $persona['estado']; ?></a></td>
                                        <?php } else { ?>
                                            
                                         <td><a class="btn btn-danger" href="../CONTROLADOR/GestionarUsuario.php?op=7&usu=<?php echo $persona['id_usu']; ?>"  ><?php echo $persona['estado']; ?></a></td>
                                       
                                        <?php } ?>
               
                                        <td> <a href="EditarUsuario.php? id_trabajador=<?php echo $persona["id_trabajador"]; ?> &id_usu=<?php echo $persona["id_usu"]; ?>&nombre=<?php echo $persona['nombre']; ?>&apellido=<?php echo $persona['apellido']; ?>&dni=<?php echo $persona['dni']; ?>&tipo_nombre=<?php echo $persona['tipo_nombre']; ?>&usu_nombre=<?php echo $persona['usu_nombre']; ?>&usu_contra=<?php echo $persona['usu_contra']; ?>&tipo_descripcion=<?php echo $persona['tipo_descripcion']; ?>"
                                        
                                       class="btn btn-success">Modificar</a>  </td>
                                        
                                      <!--  <td> <a href="../CONTROLADOR/GestionarUsuario.php?op=4&id_trabajador=<?php //echo $persona["id_trabajador"]; ?>"  class="btn btn-danger">Eliminar</a>  </td>  

-->

                                </tr>
                                <?php
                            }
                            ?> 

                                
                            </tbody>

                        </table>
                        
                      

                  
                    </div>
                </form>
            </div>            
        </div> 
    </div>  
    
    <!--<form name="formInsertar" id="formInsertar" action="RegistrarUsuario.php">

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                            <input  name="nombre"type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Apellido:</label>
                            <input  name="apellido" class="form-control" id="message-text"></textarea>
                        </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Dni:</label>
                            <input  name="dni" class="form-control" id="message-text"></textarea>
                        </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Tipo Usuario:</label>
                            <select  name="tipoUsuario" class="form-control" id="message-text">
                        
                                <option>COLABORADOR</option>
                                <option>JEFE</option>
                                <option>RRHH</option>
                            </select>
                        </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Nombre Usuario:</label>
                            <input  name="nombreUsuario" class="form-control" id="message-text"></textarea>
                        </div> 
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Contraseña:</label>
                            <input  name="contraseña" class="form-control" id="message-text"></textarea>
                        </div>
                      
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Descripcion:</label>
                            <textarea  name="descripcion" class="form-control" id="message-text"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                        <input type="hidden" value="2" name="op">
                        <input type="submit" value="enviar" id="boton" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
    </form>    


    -->
    


  
    <!-- REQUERIDO PARA EL DATATABLE -->
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
    <!-- REQUERIDO PARA EL DATATABLE -->
    <script src="../JAVASCRIPT/Jquery/jquery-3.3.1.min.js"></script>
    <script src="../JAVASCRIPT/popper/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../datatables/datatables.min.js"></script>    
    <script type="text/javascript" src="../datatables/main.js"></script>  



    <!---  AQUI IMPOTAMOS EL JAVASCRIP DEL SLIDER DESPUES DE LA LIBRERIA EASING -->
    <script src="../js/jquery.easing.1.3.js"></script>
    <script src="../JAVASCRIPT/Slider.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>




</body>
</html>

