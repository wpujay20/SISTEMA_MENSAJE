<?php


class InformesBean {

    public $id_informe;
    public $id_det_inf;
    public $id_colaborador;
    public $id_estado_inf;
    public $id_actividad;
    public $id_periodo;
    public $inf_titulo_col;
    public $inf_descripcion;
    public $inf_fecha;
    
    public function getId_informe() {
        return $this->id_informe;
    }

    public function getId_det_inf() {
        return $this->id_det_inf;
    }

    public function getId_colaborador() {
        return $this->id_colaborador;
    }

    public function getId_estado_inf() {
        return $this->id_estado_inf;
    }

    public function getId_actividad() {
        return $this->id_actividad;
    }

    public function getId_periodo() {
        return $this->id_periodo;
    }

    public function getInf_titulo_col() {
        return $this->inf_titulo_col;
    }

    public function getInf_descripcion() {
        return $this->inf_descripcion;
    }

    public function getInf_fecha() {
        return $this->inf_fecha;
    }

    public function setId_informe($id_informe) {
        $this->id_informe = $id_informe;
    }

    public function setId_det_inf($id_det_inf) {
        $this->id_det_inf = $id_det_inf;
    }

    public function setId_colaborador($id_colaborador) {
        $this->id_colaborador = $id_colaborador;
    }

    public function setId_estado_inf($id_estado_inf) {
        $this->id_estado_inf = $id_estado_inf;
    }

    public function setId_actividad($id_actividad) {
        $this->id_actividad = $id_actividad;
    }

    public function setId_periodo($id_periodo) {
        $this->id_periodo = $id_periodo;
    }

    public function setInf_titulo_col($inf_titulo_col) {
        $this->inf_titulo_col = $inf_titulo_col;
    }

    public function setInf_descripcion($inf_descripcion) {
        $this->inf_descripcion = $inf_descripcion;
    }

    public function setInf_fecha($inf_fecha) {
        $this->inf_fecha = $inf_fecha;
    }


    
    
}
