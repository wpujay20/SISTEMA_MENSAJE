<?php

class PeriodoBean {

    public $id_periodo;
    public $periodo_ini;
    public $periodo_fin;
    public $horas_dedicadas;

    public function getId_periodo() {
        return $this->id_periodo;
    }

    public function getPeriodo_ini() {
        return $this->periodo_ini;
    }

    public function getPeriodo_fin() {
        return $this->periodo_fin;
    }

    public function getHoras_dedicadas() {
        return $this->horas_dedicadas;
    }

    public function setHoras_dedicadas($horas_dedicadas) {
        $this->horas_dedicadas = $horas_dedicadas;
    }

    
    public function setId_periodo($id_periodo) {
        $this->id_periodo = $id_periodo;
    }

    public function setPeriodo_ini($periodo_ini) {
        $this->periodo_ini = $periodo_ini;
    }

    public function setPeriodo_fin($periodo_fin) {
        $this->periodo_fin = $periodo_fin;
    }



}
