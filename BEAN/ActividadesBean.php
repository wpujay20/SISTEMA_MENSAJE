<?php


class ActividadesBean {
    
    public $id_actividad;
    public $act_nombre;
    public $id_tipo_actividad;
    public $id_rubro_producto;
    public $id_rubro;
    public $id_informe;
    
    
    public function getId_rubro_producto() {
        return $this->id_rubro_producto;
    }

    public function setId_rubro_producto($id_rubro_producto) {
        $this->id_rubro_producto = $id_rubro_producto;
    }

        public function getId_informe() {
        return $this->id_informe;
    }

    public function setId_informe($id_informe) {
        $this->id_informe = $id_informe;
    }
   

    public function getId_actividad() {
        return $this->id_actividad;
    }

    public function getAct_nombre() {
        return $this->act_nombre;
    }

    public function getId_tipo_actividad() {
        return $this->id_tipo_actividad;
    }

    public function getId_rubro() {
        return $this->id_rubro;
    }

    public function setId_actividad($id_actividad) {
        $this->id_actividad = $id_actividad;
    }

    public function setAct_nombre($act_nombre) {
        $this->act_nombre = $act_nombre;
    }

    public function setId_tipo_actividad($id_tipo_actividad) {
        $this->id_tipo_actividad = $id_tipo_actividad;
    }

    public function setId_rubro($id_rubro) {
        $this->id_rubro = $id_rubro;
    }


    
    
    
    
}
