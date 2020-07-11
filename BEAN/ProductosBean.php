<?php

class ProductosBean {

    public $id_rubro_prodcutos;
    public $id_rubro;
    public $pro_titulo;
    public $pro_autor;
    public $pro_estado;
    
    public function getId_rubro_prodcutos() {
        return $this->id_rubro_prodcutos;
    }

    public function getId_rubro() {
        return $this->id_rubro;
    }

    public function getPro_titulo() {
        return $this->pro_titulo;
    }

    public function getPro_autor() {
        return $this->pro_autor;
    }

    public function getPro_estado() {
        return $this->pro_estado;
    }

    public function setId_rubro_prodcutos($id_rubro_prodcutos) {
        $this->id_rubro_prodcutos = $id_rubro_prodcutos;
    }

    public function setId_rubro($id_rubro) {
        $this->id_rubro = $id_rubro;
    }

    public function setPro_titulo($pro_titulo) {
        $this->pro_titulo = $pro_titulo;
    }

    public function setPro_autor($pro_autor) {
        $this->pro_autor = $pro_autor;
    }

    public function setPro_estado($pro_estado) {
        $this->pro_estado = $pro_estado;
    }



}
