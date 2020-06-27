<?php

class SitioTuristico {

    public $nombre;
    public $descripcion;
    public $distanciaEuclidiana;
    public $ubicacionX;
 public $ubicacionY;
 public $mapa;
 
 
 function __construct($nombre, $descripcion, $distanciaEuclidiana, $ubicacionX, $ubicacionY, $mapa) {
     $this->nombre = $nombre;
     $this->descripcion = $descripcion;
     $this->distanciaEuclidiana = $distanciaEuclidiana;
     $this->ubicacionX = $ubicacionX;
     $this->ubicacionY = $ubicacionY;
     $this->mapa = $mapa;
 }
 function getUbicacionX() {
     return $this->ubicacionX;
 }

 function getUbicacionY() {
     return $this->ubicacionY;
 }

 function setUbicacionX($ubicacionX) {
     $this->ubicacionX = $ubicacionX;
 }

 function setUbicacionY($ubicacionY) {
     $this->ubicacionY = $ubicacionY;
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

      

    }
    function getMapa() {
        return $this->mapa;
    }

    function setMapa($mapa) {
        $this->mapa = $mapa;
    }

      function get_provincia() {
            return $this->provincia;
        }
}
