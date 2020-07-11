<?php


class TrabajadorBean {

    public $trab_nombre;
    public $trab_apellido;
    public $trab_dni;
    public $ID_usu;
    public $ID_trabajador;

    public function getTrab_nombre() {
        return $this->trab_nombre;
    }

    public function getTrab_apellido() {
        return $this->trab_apellido;
    }

    public function getTrab_dni() {
        return $this->trab_dni;
    }

    public function getID_usu() {
        return $this->ID_usu;
    }

    public function getID_trabajador() {
        return $this->ID_trabajador;
    }

    public function setTrab_nombre($trab_nombre) {
        $this->trab_nombre = $trab_nombre;
    }

    public function setTrab_apellido($trab_apellido) {
        $this->trab_apellido = $trab_apellido;
    }

    public function setTrab_dni($trab_dni) {
        $this->trab_dni = $trab_dni;
    }

    public function setID_usu($ID_usu) {
        $this->ID_usu = $ID_usu;
    }

    public function setID_trabajador($ID_trabajador) {
        $this->ID_trabajador = $ID_trabajador;
    }


    
    
}
