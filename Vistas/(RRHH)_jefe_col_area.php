<?php
 
?>
<?php
if (!isset($_SESSION)) {
    ob_start();
    session_start();
    if (!isset($_SESSION["nombre"])) {
        echo '<script> document.location.href="../index.php";</script>';
    }
}
require_once '../DAO/AreasDAO.php';
$AreasDAO = new AreasDAO();


if (isset($_SESSION['jefeDeCadaArea'])) {
    $listaJefes = $_SESSION['jefeDeCadaArea'];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Lista de Jefes con sus Colaboradores </title>
        <!-- REQUERIDO PARA EL DATA TABLE -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../datatables/main.css">  
        <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
        <link rel="stylesheet"  type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    </head>
    <body > 
        <div style="height:50px">
            <div class="card-body">
                <a href="InterfaceRRHH.php" class="btn btn-secondary">Regresar Menu principal</a>
                <a href="../CONTROLADOR/GestionarUsuario.php?op=1" class="btn btn-info" >Gestionar Usuario</a>
                <a href="../CONTROLADOR/Registro_Login_Controlador.php?op=6" class="btn btn-info " >Ver áreas con (Jefes y sus colaboradores)</a><br><br>

            </div>


            <div style="padding-bottom:20px; height:50px;text-align: center">    
                <h3>Lista de Jefes con sus Colaboradores en cada área</h3>
            </div>


            <br>
            <!-----------------------------------------------------------------Ejemplo tabla con DataTables----------------------------------------------------------------->
            <div class="container ">
                <div class="">
                    <div class=" ">
                        <form style=" " name="form" method="POST" action="RegistrarUsuario.php">
                            <div class=" ">  

                                <table  style="font-size: " id="example" class="table table-striped table-bordered" style="width:100%"   >
                                    <thead class="table-primary">
                                        
                                            <th >NOMBRE Y APELLIDO DE JEFE</th>                             
                                            <th>ÁREA </th>
                                            <th>COLABORADORES </th>
                                            <th>DNI COLABORADORES </th>

                                         
                                    </thead>
                                    <?php
                                    $idarea = 0;
                                    $i = 0;
                                    foreach ($listaJefes as $jefes):

                                        $i = $i + 1;
                                        $idarea = $listaJefes[$i - 1]['id_area'];
//                                        var_dump($listaJefes[$i-1]['area_nombre']);
                                        //var_dump($jefes['area_nombre']);


                                        $ColArea = $AreasDAO->ListarLosColaboradoresDeCadaArea($idarea);
                                        $Numero = $AreasDAO->NumeroDeColaboradoresEnUnaArea($idarea);
                                        //var_dump($Numero[0]['COUNT(*)']);
                                        //var_dump($ColArea);
                                        ?>
                                        <tbody>
                                            <tr class="table-success">
                                                <td rowspan="<?php echo $Numero[0]['COUNT(*)'] + 2; ?>  "><?php echo $jefes['nombre'] ?>  <?php echo $jefes['apellido'] ?></td>  
                                                <td rowspan="<?php echo $Numero[0]['COUNT(*)'] + 2; ?>   "><?php echo $jefes['area_nombre'] ?></td>  

                                            </tr>
 
                                            <?php
                                            // var_dump( $Numero[0]['COUNT(*)']);

                                            if ($Numero[0]['COUNT(*)'] != 0) {
                                                foreach ($ColArea as $Col):

                                                    echo ' <tr class="table-warning"><td>' . $Col['nombre'] . ' ' . $Col['apellido'] . '</td> <td>' . $Col['dni'] .'</td>  </tr>'; //dni
                                                
                                                endforeach;
                                            }else {
                                                
                                                echo '<tr class="table-warning"> <td><strong >En esta área no hay colaboradores asignados</strong></td><td>______</td></tr>';
 
                                               
                                            }
                                            ?>
                                        </tbody>
                                    <?php endforeach; ?>
                                </table>

                            </div>
                        </form>
                    </div>            
                </div> 
            </div>  

            <br>    <br>    <br>    <br>    <br>
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

