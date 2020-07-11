<?php

class TipoUsuarioBean {

    public $id_tipo_usu;
    public $tipo_descripcion;
    public $tipo_nombre;

    public function getId_tipo_usu() {
        return $this->id_tipo_usu;
    }

    public function getTipo_descripcion() {
        return $this->tipo_descripcion;
    }

    public function getTipo_nombre() {
        return $this->tipo_nombre;
    }

    public function setId_tipo_usu($id_tipo_usu) {
        $this->id_tipo_usu = $id_tipo_usu;
    }

    public function setTipo_descripcion($tipo_descripcion) {
        $this->tipo_descripcion = $tipo_descripcion;
    }

    public function setTipo_nombre($tipo_nombre) {
        $this->tipo_nombre = $tipo_nombre;
    }

}
