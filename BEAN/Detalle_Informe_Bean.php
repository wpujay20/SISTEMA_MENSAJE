<?php

class Detalle_Informe_Bean {

    public $id_detalle_informe;
    public $id_jefe;
    public $titulo_desc;
    public $asunto;
    public $descripcion;

    public function getId_detalle_informe() {
        return $this->id_detalle_informe;
    }

    public function getId_jefe() {
        return $this->id_jefe;
    }

    public function getTitulo_desc() {
        return $this->titulo_desc;
    }

    public function getAsunto() {
        return $this->asunto;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setId_detalle_informe($id_detalle_informe) {
        $this->id_detalle_informe = $id_detalle_informe;
    }

    public function setId_jefe($id_jefe) {
        $this->id_jefe = $id_jefe;
    }

    public function setTitulo_desc($titulo_desc) {
        $this->titulo_desc = $titulo_desc;
    }

    public function setAsunto($asunto) {
        $this->asunto = $asunto;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

}
