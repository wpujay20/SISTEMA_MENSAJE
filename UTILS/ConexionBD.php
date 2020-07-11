<?php

class ConexionBD {

    //AQUI TENEMOS LAS VARIABLES DE CLASE QUE VAMOS A UTILIZAR
    private $servidor = 'localhost';
    private $usuario = 'root';
    private $password = '';
    private $base_datos = 'bdinformes';
    private $link;              //VARIABLE PARA LA CONEXION
    public $res;                //EL RESULTET QUE NOS DEVUELVE EL MYSQLI_QUERY
    static $_instance;            //INSTANCIA COMPARTIDA DE LA CLASE ConexionBD
    public $array;              //ARRAY ASCCIATIVO DE DATOS

    public function __construct() {      //AL HACER LA PRIMERA INSTANCIA SE CREA UNA SOLA VARIABLE DE CONEXION- YA QUE EL CONSTRUCTOR ES LO
        //PRIMERO QUE SE  EJECUTA                  
        $this->conectar();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof ConexionBD)) {     //EL IF SOLO SE EJECUTARA EN CASO NO EXISTA UNA INSTANCIA DE LA CLASE  ConexionBD 
            self::$_instance = new ConexionBD();
        }
        return self::$_instance;            //NOS DEVUELVE LA INSTANCIA DEFINITIVA
    }

    public function conectar() {
        $this->link = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->base_datos);
        mysqli_set_charset($this->link, "utf8");        //PARA LAS TILDES Y CARACTERES LATINOS
    }

    public function desconectar() {
        mysqli_close($this->link);
    }

    //METODO PARA EJECUTAR LAS SENTENCIAS SQL SIN USAR MUCHO CODIGO
    public function ejecutar($sql) {
        $this->res = mysqli_query($this->link, $sql);
        return $this->res;
    }

    //METODO PARA EJECUTAR LAS SENTENCIAS SQL SIN USAR MUCHO CODIGO
    public function EjecutarConEstado($sql) {
        $estado = mysqli_query($this->link, $sql);

        return $estado;
    }

//Método para obtener una fila de resultados de la sentencia sql
    public function obtener_filas($stmt) {

        while ($lista = mysqli_fetch_assoc($stmt)) {
            $this->array[] = $lista;
        }
        return $this->array;
    }
    
    
        public function obtener_filas_Numericas($stmt) {

        while ($lista = mysqli_fetch_row($stmt)) {
            $this->array[] = $lista;
        }
        return $this->array;
    }
    
    
    
    

    //Devuelve el último id del insert introducido
    public function Ultimo_ID() {
        return mysqli_insert_id($this->link);
    }

    public function getLink() {
        return $this->link;
    }

    public function setLink($link) {
        $this->link = $link;
    }
    
    public function getArray() {
        return $this->array;
    }

    public function setArray($array) {
        $this->array = $array;
    }


    
    

}

/*


            
 
//**************************************************PASOS PARA USAR EL SINGLETON*************************************************


CREAREMOS LA INSTANCIA- PERO SI YA FUE CREADA EN OTRA PARTE SOLO NOS DEVIOLVERA LA QUE SE HIZO ANTES
 * 
$instancia = Db::getInstance();


DESPUES TENDREMOS QUE ALAMACENAR EL RESULSET CON EL METODO EJECUTAR Y LE PASAMOS EL SQL CLARO
$res = $instancia->ejecutar("SELECT * FROM personas");

DESPUES OBTENEMOS LAS FILAS EN MODO ARRAY
$array = $instancia->obtener_fila($res);

FINALMENTE USAMOS VAR_DUMP PARA IMPRIMIR (OPCIONAL)
var_dump($array);*/
 

     