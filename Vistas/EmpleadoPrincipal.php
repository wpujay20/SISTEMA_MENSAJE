<?php
session_start();

if (!isset($_SESSION["nombre"])) {
    echo '<script> document.location.href="../index.php";</script>';
}

$informesColb = $_SESSION['LISTA_INFORMES_COLABORADOR'];
?>

<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <!--datables CSS basico-->
        <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
        <!--datables estilo bootstrap 4 CSS-->  
        <link rel="stylesheet"  type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

        <title>Menú</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="../JAVASCRIPT/Opcion_Cerrar_Sesion.js"></script>
        
 

    </head> 
    <body>
        <div style="height:50px">
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Redactar Informes de Actividades</button>
                <a href="#" class="btn btn-secondary" id="cerrar">Cerrar Sesion</a>
                <br><br><label class="text-left;"> <?php echo "<strong>Bienvenido</strong> <br>" . $_SESSION['nombre'] . " " . $_SESSION['apellido'] . "<br>Area : " . $_SESSION['area_nombre']; ?> </label>
            </div>


            <!-- Tabla Informes -->
            <!--Ejemplo tabla con DataTables-->
            <div style="padding-bottom:20px; height:50px;text-align: center">    
                <h3>Menu Principal Colaborador</h3>
            </div>

            <!--Ejemplo tabla con DataTables-->
            <div style="max-width: 1350px;" class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">        
                            <table style="font-size: small" id="example" class="table table-striped table-bordered" style="width:100%"><thead>
                                    <tr>
                                        <th class="th-sm" scope="col">ID_inf</th>
                                        <th class="th-sm" scope="col">Titulo</th>
                                        <th class="th-sm" scope="col">Area</th>               
                                        <th class="th-sm" scope="col">Fecha_Inf</th>
                                        <th class="th-sm" scope="col">Periodo</th>
                                        <th class="th-sm" scope="col">Horas dedicadas</th>
                                        <th class="th-sm" scope="col">Estado</th>
                                        <th class="th-sm" scope="col" >Acciones</th>
                                        <th class="th-sm" scope="col" >Acciones</th>
                                        <th class="th-sm" scope="col" >Acciones</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($informesColb == null) {
                                        echo "<strong> Aun no tienes informes creados </strong><br><br>";
                                    } else {

                                        foreach ($informesColb as $indice):
                                            ?>
                                            <tr>
                                                <td><?php echo $indice['id_informe'] ?></td>
                                                <td><?php echo $indice['inf_titulo_col'] ?></td>
                                                <td><?php echo $indice['area_nombre'] ?> </td>
                                                <td><?php echo $indice['inf_fecha'] ?></td>
                                                <td><?php echo $indice['periodo_fin'] . " hasta " . $indice['periodo_ini'] ?></td>
                                                <td><?php echo $indice['periodo_horas'] ?></td>
                                                <td><?php echo $indice['nom_estado_inf'] ?> </td>
                                                
                                                <?php if($indice['nom_estado_inf']=='Generado'){ ?>
                                                
                                                <td><a href="../CONTROLADOR/ColaboradorControlador.php?del=1&op=9&id_informe=<?php echo $indice['id_informe']?>" class="btn btn-danger"> Eliminar </a></td>  
                                                <td><a href="#" class="btn btn-success"> Editar </a></td>
                                                <td><a href="../CONTROLADOR/ColaboradorControlador.php?msj=1&op=8&id_informe=<?php echo $indice['id_informe']?>" class="btn btn-primary"> Enviar </a></td>   
                                                
                                                <?php } else { echo "<td></td><td></td><td></td>";}?>
                                                </tr>

                                            <?php
                                        endforeach;
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>  
            <br>




            <!-- Modal PARA SELCECCIONAR QUE ACTIVIDADES DESEAMOS REDACTAR -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">¿Que tipo de informe vas a redactar?</h5>
                        </div>
                        <div class="modal-body">
                            <center><a href="../CONTROLADOR/ColaboradorControlador.php?op=1&tipo_Actividad=2" class="btn btn-success">Actividades Realizadas</a>
                                <a href="../CONTROLADOR/ColaboradorControlador.php?op=1&tipo_Actividad=1"  class="btn btn-danger">Actividades Planificadas</a></center>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>






        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <!-- jQuery, Popper.js, Bootstrap JS -->
        <script src="../jquery/jquery-3.3.1.min.js"></script>
        <script src="../popper/popper.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>

        <!-- datatables JS -->
        <script type="text/javascript" src="../datatables/datatables.min.js"></script>    

        <script type="text/javascript" src="../jquery/main.js"></script>  

    </body>
</html>