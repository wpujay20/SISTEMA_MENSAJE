<?php
session_start();

if (isset($_SESSION['LISTA_INFORMES_JEFE_PRELIMINAR'])) {   
    $InformesJEFE = $_SESSION['LISTA_INFORMES_JEFE_PRELIMINAR']; 
    $Lista_Rubros_completos = $_SESSION['LISTA_RUBROS'];
}

if ($_SESSION['LISTA_INFORMES_JEFE_PRELIMINAR']==null){
        $InformesJEFE=null;
 }
var_dump($Lista_Rubros_completos);
// $fecha= date('d/m/Y H:i:s', strtotime('now'));
// $fecha= date('m/d/Y', strtotime('now'));
// $dat= strftime("%V", strtotime($fecha));
// var_dump($fecha);
// var_dump($dat);
 
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
        <script src="../jquery/Jefe.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="../JAVASCRIPT/Opcion_Cerrar_Sesion.js"></script>

    </head> 
    <body>
        <div style="height:50px">
            <div class="card-body">
                <!-- Button trigger modal -->
                <a href="../CONTROLADOR/Jefe_Controlador.php?op=3" class="btn btn-info">Gestionar Informes de Actividad</a>
                
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModa2">Gestionar Rubros</button>

              <a href="#" class="btn btn-secondary" id="cerrar">Cerrar Sesion</a>
                 <br><br><label class="text-left;"> <?php echo "<strong>Bienvenido</strong> <br>" . $_SESSION['nombre'] . " " . $_SESSION['apellido'] ."<br>Area : ". $_SESSION['area_nombre'];?> </label>
            
            </div>


            <!-- Tabla Informes -->
            <!--Ejemplo tabla con DataTables-->
            <div style="padding-bottom:20px; height:50px;text-align: center">    
                <h3>Menu Principal Jefe</h3>
            </div>

            <!--Ejemplo tabla con DataTables-->
            <div style="max-width: 1350px;" class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">        
                            <table style="font-size: small" id="example" class="table table-striped table-bordered" style="width:100%"><thead>
                                    <tr>
                                        <th class="th-sm" scope="col" >ID_Inf</th>
                                        <th class="th-sm" scope="col" >Nombres Colaborador</th>
                                        <th class="th-sm" scope="col" >Apellidos Colaborador</th>
<!--                                        <th class="th-sm" scope="col" >DNI</th>-->
                                        <th class="th-sm" scope="col">Tipo_de_Actividad</th>
                                        <th class="th-sm" scope="col">Titulo</th>
                                        <th class="th-sm" scope="col">Area</th>               
                                        <th class="th-sm" scope="col">Fecha</th>
                                        <th class="th-sm" scope="col">Periodo</th>                                      
                                        <th class="th-sm" scope="col">Horas dedicadas</th>
                                        <th class="th-sm" scope="col">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($InformesJEFE == null ) {
                                        echo "<strong> Aun no tienes informes recibidos por colaboradores </strong><br><br>";
                                    } else {

                                        foreach ($InformesJEFE as $indice):
                                            ?>
                                            <tr>
                                                <td><?php echo $indice['id_informe'] ?></td>
                                                <td><?php echo $indice['nombre'] ?> </td>
                                                <td><?php echo $indice['apellido'] ?> </td>
<!--                                                <td><?php //echo $indice['dni'] ?> </td>-->
                                                <td><?php echo $indice['nomb_tipo_act'] ?></td>
                                                <td><?php echo $indice['inf_titulo_col'] ?></td>
                                                <td><?php echo $indice['area_nombre'] ?> </td>
                                                <td><?php echo $indice['inf_fecha'] ?></td>
                                                <td><?php echo $indice['periodo_fin'] ." hasta ". $indice['periodo_ini'] ?></td>
                                           
                                                <td><?php echo $indice['periodo_horas'] ?></td>
                                                <td><?php 
                                                if($indice['nom_estado_inf']=="Enviado a Jefatura"){
                                                     echo "<div style='color:blue; font-weight:bold;'>" .$indice['nom_estado_inf']."</div>";
                                                }
                                                else if($indice['nom_estado_inf']=="Aprobado por Jefatura"){
                                                     echo "<div style='color:green; font-weight:bold;'>" .$indice['nom_estado_inf']."</div>";
                                                }
                                                else if($indice['nom_estado_inf']=="Enviado a RRHH"){
                                                     echo "<div style='color:black; font-weight:bold;'>" .$indice['nom_estado_inf']."</div>";
                                                }
                                                ?> 
                                                </td>
                                             
                                            </tr>

                                <?php endforeach;
                            } ?>

                                </tbody>
                               
                            </table>
                        </div>
                    </div>
                </div>
            </div>  
            <br>


            
            
            
            
            
            <!-- Moda2  GESTIONAR RUBROS POR PARTE DEL JEFE -->
            <div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width: 200%; right: 50%; ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Menu de Gestion de Rubros</h5>
                        </div>
                        <div class="modal-body">
                            <strong><p>Recuerda que no puedes eliminar rubros que esten relacionados a otras actividades </p></strong>
                            <form name="form_rubros" action="../CONTROLADOR/Jefe_Controlador.php?op=1" method="post">
                            <div style="max-width: 1350px;" class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">        
                                            <table style="font-size: small" id="example" class="table table-striped table-bordered" style="width:100%"><thead>
                                                    <tr>
                                                       <th class="th-sm" scope="col">id_rubro</th>
                                                        <th class="th-sm" scope="col">nombre_rubro</th>               
                                                        <th class="th-sm" scope="col">descripcion</th>
                                                        <th class="th-sm" scope="col" >Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($Lista_Rubros_completos == null) {
                                                        echo "<strong> No hay  rubros disponibles. Puedes crear unos  </strong><br><br>";
                                                    } else {

                                                        foreach ($Lista_Rubros_completos as $indice):
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $indice['id_rubro'] ?></td>
                                                                <td><?php echo $indice['nomb_rubro'] ?> </td>
                                                                <td><?php echo $indice['desc_rubro'] ?></td>
                                                                <td><a href="../CONTROLADOR/Jefe_Controlador.php?op=2&id_rubro=<?php echo $indice['id_rubro'];?>" class="btn btn-danger"> Eliminar </a></td>  
                                                            </tr>
                                                                    <?php endforeach;
                                                            } ?>
                                                            
                                                            <tr>
                                                                <td></td>
                                                                <td> <input type="text"  class="form-control" required="" id="nombre_rubro" name="nombre_rubro" ></td>
                                                                <td> <textarea class="form-control" required="" name="descripcion" id="descripcion"></textarea></td>
                                                                
                                                                <td> <input type="submit" class="btn btn-success" value="Agregar Rubro"></td>
                                                            </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>  
</form>
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