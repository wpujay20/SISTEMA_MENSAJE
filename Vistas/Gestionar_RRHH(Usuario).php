<?php
if (!isset($_SESSION)) {
    ob_start();
    session_start();
    if (!isset($_SESSION["nombre"])) {
        echo '<script> document.location.href="../index.php";</script>';
    }

    $lista = $_SESSION["GESTIONAR_USUARIO"];
}
// var_dump($lista);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Gestionar Usuarios </title>
        <!-- REQUERIDO PARA EL DATA TABLE -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../datatables/main.css">  
        <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
        <link rel="stylesheet"  type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    </head>
    <body > 
           
        <!-----------------------------------------------------------------ZONA SLIDER----------------------------------------------------------------->
        <div style="height:50px">
            <div class="card-body">
                <a href="InterfaceRRHH.php" class="btn btn-secondary">Regresar Menu principal</a>
                <a href="../CONTROLADOR/Registro_Login_Controlador.php?op=2" class="btn btn-info" >Registar Usuarios (Colaborador,Jefes,RR.HH)</a>
                <a href="../CONTROLADOR/Registro_Login_Controlador.php?op=6" class="btn btn-info " >Ver áreas con (Jefes y sus colaboradores)</a><br><br>

            </div>

        
        <div style="padding-bottom:20px; height:50px;text-align: center">    
            <h3>Gestionar Usuarios</h3>
        </div>


        <br>  
        <!-----------------------------------------------------------------Ejemplo tabla con DataTables----------------------------------------------------------------->
        <div class="container ">
            <div class="">
                <div class="col-lg-12">
                    <form style="margin:0px 0px 50px 0px" name="form" method="POST" action="RegistrarUsuario.php">
                        <div class="table-responsive">  

                            <table   style="font-size:small" id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <th> id</th>
                                <th  >Nombre y Apellidos</th>                             
                                <th>Dni</th>
                                <th>Tipo Usuario</th>
                                <th>User </th>
                                <th>Password</th>
                                <th>descripcion</th>
                                <th>estado</th>
                                <!--<th>área de trabajo</th>-->
                                <th>Modificar</th> 
                                </thead> 
                                <tbody>
                                    <?php
                                    foreach ($lista as $persona) {
                                        ?>                
                                        <tr>
                                            <td><?php echo $persona['id_trabajador']; ?></td>
                                            <td><?php echo $persona['nombre']; ?> <?php echo $persona['apellido']; ?> </td>                                        
                                            <td><?php echo $persona['dni']; ?></td>
                                            <td><?php echo $persona['tipo_nombre']; ?></td>
                                            <td><?php echo $persona['usu_nombre']; ?></td>
                                            <td><?php echo $persona['usu_contra']; ?></td>
                                            <td><?php echo $persona['tipo_descripcion']; ?></td>

                                            <?php if ($persona['estado'] == 'habilitado') { ?>
                                                <td><a class="btn btn-primary" href="../CONTROLADOR/GestionarUsuario.php?op=6&usu=<?php echo $persona['id_usu']; ?>" ><?php echo $persona['estado']; ?></a></td>
                                            <?php } else { ?>

                                                <td><a class="btn btn-danger" href="../CONTROLADOR/GestionarUsuario.php?op=7&usu=<?php echo $persona['id_usu']; ?>"  ><?php echo $persona['estado']; ?></a></td>
                                            <?php } ?>
                                            <td> <a href="EditarUsuario.php? 
                                                    id_trabajador=<?php echo $persona["id_trabajador"]; ?> 
                                                    &id_usu=<?php echo $persona["id_usu"]; ?>
                                                    &nombre=<?php echo $persona['nombre']; ?>
                                                    &apellido=<?php echo $persona['apellido']; ?>
                                                    &dni=<?php echo $persona['dni']; ?>
                                                    &tipo_nombre=<?php echo $persona['tipo_nombre']; ?>
                                                    &usu_nombre=<?php echo $persona['usu_nombre']; ?>
                                                    &usu_contra=<?php echo $persona['usu_contra']; ?>
                                                    &tipo_descripcion=<?php echo $persona['tipo_descripcion']; ?>
                                                    &idTipoUsu=<?php echo $persona['id_tipo_usu']; ?>"
                                                    class="btn btn-success">Modificar</a>  </td>
            <!--  <td> <a href="../CONTROLADOR/GestionarUsuario.php?op=4&id_trabajador=<?php //echo $persona["id_trabajador"];       ?>"  class="btn btn-danger">Eliminar</a>  </td>  
                                            -->
                                        </tr>
                                    <?php } ?> 
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>            
            </div> 
        </div>  





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

