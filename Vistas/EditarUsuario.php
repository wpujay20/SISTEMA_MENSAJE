
<?php
session_start();
if (!isset($_SESSION["nombre"])) {
    echo '<script> document.location.href="../index.php";</script>';
}

require_once '../DAO/GestionarUsuarioDAO.php';
require_once '../DAO/AreasDAO.php';
require_once '../DAO/TiposUsuarioDAO.php';

            $id_trabajador = $_REQUEST['id_trabajador'];
            $id_usu = $_REQUEST['id_usu'];
            $trab_nombre = $_REQUEST['nombre'];
            $trab_apellido = $_REQUEST['apellido'];
            $trab_dni = $_REQUEST['dni'];
            $usu_nombre = $_REQUEST['usu_nombre'];
            $usu_contra = $_REQUEST['usu_contra']; 
            $tipo_nombre = $_REQUEST['tipo_nombre'];
            $idTipousu=$_REQUEST['idTipoUsu'];
             
$objGestionDAO = new GestionDAO();
$objAreasDAO = new AreasDAO();
$objTipoUsuarioDAO = new TipoUsuarioDAO();

$lista = $objGestionDAO->Listar_usuarios();
$listaAreaas = $objAreasDAO->ListarAreas();
$listaTipos = $objTipoUsuarioDAO->ListarTipos_Usuarios();


if($idTipousu == 1){
    // area del jefe
    $areaJefe=$objAreasDAO->ListarAreaPorID($id_trabajador);
    $area=$areaJefe[0]['area_nombre'];
    
}else{
    if($idTipousu==2){
        //area del colaborador
        $areaColaborador = $objAreasDAO->ListarAreaPorIDCol($id_trabajador);
        $area=$areaColaborador[0]['area_nombre'];
    }
}

?>
<html lang="es">
    
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Validate css-->
        <link href="../CSS/EstiloRegister.css" rel="stylesheet">	
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <!--datables CSS basico-->
        <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
        <!--datables estilo bootstrap 4 CSS-->  
        <link rel="stylesheet"  type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

        <title>Menú</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="../jquery/Jefe.js"></script>
        <script src="../js/jquery.validate.min.js"></script>
        <script src="../js/ValidarFormularios.js"></script>


    </head> 
    <body>

        <form name="formInsertar" id="" method="post" action="../CONTROLADOR/GestionarUsuario.php?op=3&ID_TRABA=<?php echo $id_trabajador;?>&id_usu=<?php echo $id_usu;?>&tipo_usu=<?php echo $idTipousu ?>" >



            <div style="padding: 30px 200px 100px 200px ; ">

                <div class="modal-header">
                    <strong> <h4 class="modal-title" id="exampleModalLabel">Modificar usuario</h4></strong>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre"  placeholder="Nombre del usuario" value= "<?php echo $trab_nombre ?>" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellido:</label>
                        <input type="text" class="form-control" name="apellido"  placeholder="Apellido del usuario" value= "<?php echo $trab_apellido ?>"  required="">
                    </div>
                         <div class="form-group">
                        <label for="recipient-name" class="col-form-label">DNI:</label>
                        <input name="dni"  type="text" class="form-control" value= "<?php echo $trab_dni ?>">
                    </div>
   
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre de usuario:</label>
                        <input type="text" class="form-control" name="usu_nombre" min="8" placeholder="Nombre Usuario" value= "<?php echo $usu_nombre ?>"  required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Contraseña</label>
                        <input type="text" class="form-control" name="usu_contra"  placeholder="Contraseña" value= "<?php echo $usu_contra ?>"  required="">
                    </div>
                   <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tipo de Usuario</label>
                        <input type="text" class="form-control" name=""   readonly="" value="<?php echo $tipo_nombre?>">
                    </div>
                                         
                    <?php 
                    if($idTipousu == 3){
                        
                    }else{
                    ?>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Área Actual</label>
                        <input type="text" class="form-control" name=""   readonly="" value="<?php echo $area  ?>" >
                    </div>
                     
                    <div class="form-group" >
                        <label>Seleccione Área al que quiere cambiar</label>
                        <select class="form-control" name="area"  required="" >    
                            <option> </option>
                            <?php
                            foreach ($listaAreaas as $fila) {
                                 
                                echo "<option value='" . $fila['id_area'] . "'>" . $fila['area_nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <?php } ?>

                </div>
                <div class="modal-footer">

                    <a href="Gestionar_RRHH(Usuario).php" class="btn btn-secondary" >Volver</a>
                    
                   
                    <input type="submit" value="enviar" id="boton" class="btn btn-success">
                </div>
            </div>

        </form> 

    </body>

    <!-- datatables JS -->
    <script type="text/javascript" src="../datatables/datatables.min.js"></script>    

    <script type="text/javascript" src="../jquery/main.js"></script>  

</body>
</html>