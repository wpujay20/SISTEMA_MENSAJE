<?php
require_once '../UTILS/ConexionBD.php';
require_once '../BEAN/ProductosBean.php';
require_once '../BEAN/ActividadesBean.php';

class ProductosDAO {
    
     public function ListarProductos(){
        
            //1 : planificadas
            //2: realizadas
            
          $instanciacompartida = ConexionBD::getInstance();
          $sql = "SELECT * FROM rubro_productos as prod";
            
          $res = $instanciacompartida->ejecutar($sql);
          $lista = $instanciacompartida->obtener_filas($res);
          return $lista;
        
    }
    
    
    public function  InsertarDetallesProducto(ProductosBean $ProductosBean){
        $instanciacompartida = ConexionBD::getInstance();
        $sql = "INSERT INTO rubro_productos (pro_titulo, pro_autor, pro_estado)
                VALUES ('$ProductosBean->pro_titulo', '$ProductosBean->pro_autor', '$ProductosBean->pro_estado')";

        $estado = $instanciacompartida->EjecutarConEstado($sql);
        
        $ProductosBean->setId_rubro_prodcutos($instanciacompartida->Ultimo_ID());

        return $estado;
    }
    
    
}
