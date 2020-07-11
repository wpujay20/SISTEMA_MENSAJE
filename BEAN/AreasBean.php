<?php

class AreasBean {

    public $id_area;
    public $area_nombre;

    public function getId_area() {
        return $this->id_area;
    }

    public function getArea_nombre() {
        return $this->area_nombre;
    }

    public function setId_area($id_area) {
        $this->id_area = $id_area;
    }

    public function setArea_nombre($area_nombre) {
        $this->area_nombre = $area_nombre;
    }

}
