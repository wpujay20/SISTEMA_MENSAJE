<?php
require_once '../UTILS/ConexionBD.php';

class AreasDAO {
   
        public function ListarAreas(){
        
          $instanciacompartida = ConexionBD::getInstance();
          $sql = "SELECT * FROM area";
            
          $res = $instanciacompartida->ejecutar($sql);
          $lista = $instanciacompartida->obtener_filas($res);
          return $lista;
        
    }
    
    
}
