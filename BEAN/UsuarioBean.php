<?php


class UsuarioBean {

    public $id_tipo_usu;
    public $id_usu;
    public $usu_nombre;
    public $usu_contra;
    public $usu_estado;

    public function getUsu_estado() {
        return $this->usu_estado;
    }

    public function setUsu_estado($usu_estado) {
        $this->usu_estado = $usu_estado;
    }

        public function getId_tipo_usu() {
        return $this->id_tipo_usu;
    }

    public function getId_usu() {
        return $this->id_usu;
    }

    public function getUsu_nombre() {
        return $this->usu_nombre;
    }

    public function getUsu_contra() {
        return $this->usu_contra;
    }

    public function setId_tipo_usu($id_tipo_usu) {
        $this->id_tipo_usu = $id_tipo_usu;
    }

    public function setId_usu($id_usu) {
        $this->id_usu = $id_usu;
    }

    public function setUsu_nombre($usu_nombre) {
        $this->usu_nombre = $usu_nombre;
    }

    public function setUsu_contra($usu_contra) {
        $this->usu_contra = $usu_contra;
    }


}
