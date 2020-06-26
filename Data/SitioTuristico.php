<?php

class SitioTuristico {

    public $nombre;
    public $descripcion;
    public $distanciaEuclidiana;

    function __construct($nombre, $descripcion, $precio, $provincia, $distanciaEuclidiana) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->distanciaEuclidiana = $distanciaEuclidiana;
        $this->precio = $precio;
        $this->provincia = $provincia;
    }

    function get_nombre() {
        return $this->nombre;
    }

    function get_descripcion() {
        return $this->descripcion;
    }

    function get_distanciaEuclidiana() {
        return $this->distanciaEuclidiana;
    }

    function get_precio() {
        return $this->precio;

        function get_provincia() {
            return $this->provincia;
        }

    }

}
