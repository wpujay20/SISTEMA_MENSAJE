<?php
if (!isset($_SESSION)) {
    session_start();
}
     $informesRRHH = $_SESSION['LISTA_INFORMES_RR_HH'];
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

        <title>Menú RR_HH</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        
        <script src="../JAVASCRIPT/Opcion_Cerrar_Sesion.js"></script>

    </head> 
    <body>
        <div style="height:50px">
            <div class="card-body">
                <!-- Button trigger modal -->
                <a href="../CONTROLADOR/Registro_Login_Controlador.php?op=2" class="btn btn-info" >Registar Usuarios (Colaborador,Jefes,RR.HH)</a>
                 <a href="#" class="btn btn-secondary" id="cerrar">Cerrar Sesion</a>
                <br><br><label class="text-left;"> <?php echo "<strong>Bienvenido</strong> <br>" . $_SESSION['nombre'] . " " . $_SESSION['apellido'] ."<br>Area : ". $_SESSION['area_nombre'];?> </label>
            </div>
           

            <!-- Tabla Informes -->
            <!--Ejemplo tabla con DataTables-->
            <div style="padding-bottom:20px; height:50px;text-align: center">    
               <h3>Menu Principal RR.HH</h3>
            </div>

            <!--Ejemplo tabla con DataTables-->
             <div style="max-width: 1350px;" class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">        
                            <table style="font-size: small" id="example" class="table table-striped table-bordered" style="width:100%"><thead>
                                    <tr>

                                        <th class="th-sm" scope="col">Id_Informe</th>
                                        <th class="th-sm" scope="col">Titulo_informe</th>               
                                        <th class="th-sm" scope="col">Fecha</th>
                                        <th class="th-sm" scope="col">Area</th>
                                        <th class="th-sm" scope="col">Nombre_jefe</th>
                                        <th class="th-sm" scope="col">Apellido_jefe</th>
                                        <th class="th-sm" scope="col">Dni_Jefe</th>
                                        <th class="th-sm" scope="col">Estado</th>
                                        <th class="th-sm" scope="col" >Acciones</th>
                                        <th class="th-sm" scope="col" >Acciones</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($informesRRHH == null){
                                        echo "<strong> Aun no has recibido informes por parte de Jefatura </strong><br><br>";
                                    }else{
                                    
                                    foreach ($informesRRHH as $indice):?>
                                    <tr>

                                        <td><?php echo $indice['id_informe']?></td>
                                        <td><?php echo $indice['inf_titulo_col']?></td>
                                        <td><?php echo $indice['inf_fecha']?></td>
                                        <td><?php echo $indice['area_nombre']?></td>
                                        <td><?php echo $indice['nombre']?></td>
                                        <td><?php echo $indice['apellido']?></td>
                                        <td><?php echo $indice['dni']?></td>
                                        <td><?php echo $indice['nom_estado_inf']?></td>
                                        <td><a href="../CONTROLADOR/RRHH_Controlador.php?op=1&id_informe=<?php echo $indice['id_informe'];?>" class="btn btn-info"> Visualizar </a></td>
                                        <td>
                                        <?php
                                        if($indice['nom_estado_inf']!="Archivado"){
                                        ?>
                                        <a href="../CONTROLADOR/RRHH_Controlador.php?op=2&msj=1&id_informe=<?php echo $indice['id_informe'];?>" class="btn btn-primary"> Archivar </a>
                                        <?php }?>
                                        </td>
                                    </tr>
                                        <?php endforeach; }?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>  
            <br>




            <!-- Modal PARA SELCECCIONAR QUE ACTIVIDADES DESEAMOS REDACTAR -->
<!--            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">¿Que tipo de informe vas a redactar?</h5>
                        </div>
                        <div class="modal-body">
                            <center><a href="#" class="btn btn-success">Actividades Realizadas</a>
                                <a href="#" class="btn btn-danger">Actividades Planificadas</a></center>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>-->






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