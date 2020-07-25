}<?php

require_once '../BEAN/RubrosBean.php';
require_once '../UTILS/ConexionBD.php';


class RubrosDAO {
       public function ListarRubrosSinProductos() {

        //1 : planificadas
        //2: realizadas

        try {

            $instanciacompartida = ConexionBD::getInstance();
            $sql = "SELECT * FROM rubro as rub where rub.id_rubro<>5";

            $res = $instanciacompartida->ejecutar($sql);
            $lista = $instanciacompartida->obtener_filas($res);

            $instanciacompartida->setArray(null);
            return $lista;
            
        } catch (Exception $ex) {
           
        } finally {
           
        }
    }
    
    
    public function RegistarRubro_Personalizado(RubrosBean $RubrosBean){
        

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "INSERT INTO rubro (nomb_rubro,desc_rubro) VALUES ('$RubrosBean->nomb_rubro','$RubrosBean->desc_rubro') ";
        
        $estado = $instanciacompartida->EjecutarConEstado($sql);
        $RubrosBean->setId_rubro($instanciacompartida->Ultimo_ID());

        return $estado;
  
    }
    
    
    
    
    
    //***PREPARACIONES PARA LA ELIMINACION
    
    public function ListarEliminarRubros($id_informes){
        
        $instanciaCompartida = ConexionBD::getInstance();
       
        $sql = "SELECT *
                FROM informe as inf
                INNER JOIN actividad as act ON inf.id_informe = act.id_informe
                INNER JOIN rubro as rub on rub.id_rubro= act.id_rubro
                WHERE inf.id_informe=$id_informes and rub.id_rubro>5";
            
        $rs = $instanciaCompartida->ejecutar($sql);
        $array = $instanciaCompartida->obtener_filas_Numericas($rs);

        return $array;

    
    }
    

    public function ArraydeRubrosPersonalizadosParaBorrar($array){
        
        for ($index = 0; $index < count($array); $index++) {
            
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "DELETE FROM rubro WHERE id_rubro = ". $array[$index][11]. " ";
            $estado = $instanciacompartida->EjecutarConEstado($sql); 
        }  
         return $estado;
    }




    public function ListarEliminarRubrosProductos($id_informes){
        
        $instanciaCompartida = ConexionBD::getInstance();
       
        $sql = "SELECT *
                FROM informe as inf
                INNER JOIN actividad as act ON inf.id_informe = act.id_informe
                INNER JOIN rubro_productos as pro on pro.id_rubro_productos=act.id_rubro_productos
                WHERE inf.id_informe=$id_informes";
            
        $rs = $instanciaCompartida->ejecutar($sql);
        $array = $instanciaCompartida->obtener_filas_Numericas($rs);   
        return $array;
    
    }
    

    public function ArraydeRubrosPersonalizadosParaBorrar_Productos($array){
        
        for ($index = 0; $index < count($array); $index++) {
            
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "DELETE FROM rubro_productos WHERE id_rubro_productos = ". $array[$index][12]. " ";
            $estado = $instanciacompartida->EjecutarConEstado($sql); 
        } 
        
        
        return $estado;
    }
    
    public function EliminarRubroProductosPorID($id_rubro_productos){

            $instanciacompartida = ConexionBD::getInstance();
            $sql = "DELETE FROM rubro_productos WHERE id_rubro_productos = $id_rubro_productos";
            $estado = $instanciacompartida->EjecutarConEstado($sql); 
        return $estado;
    }
    
      public function EliminarRubroSeleccionadoporID(RubrosBean $RubrosBean){

            $instanciacompartida = ConexionBD::getInstance();
            $sql = "DELETE FROM rubro WHERE id_rubro = $RubrosBean->id_rubro";
            $estado = $instanciacompartida->EjecutarConEstado($sql); 
        return $estado;
    }
     
    
    
    public function ListarRubrosCompletos(){
        
         try {
          
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "SELECT * FROM rubro";

            $res = $instanciacompartida->ejecutar($sql);
            $lista = $instanciacompartida->obtener_filas($res);

            $instanciacompartida->setArray(null);
            return $lista;
            
        } catch (Exception $ex) {
        } finally {
        }
    
    }
    

    
}


