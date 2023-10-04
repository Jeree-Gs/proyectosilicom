<?php

namespace Model;

class Almacen extends ActiveRecord {
    protected static $tabla = 'productos';
    protected static $columnasDB = ['id', 'nombre', 'detalles', 'precioPublico', 'precioMUno', 'precioMDos', 'precioMTres', 'precioMCuatro', 'imagen', 'tags', 'precioMCinco' ];

    public $id;
    public $nombre;
    public $detalles;
    public $precioPublico;
    public $precioMUno;
    public $precioMDos;
    public $precioMTres;
    public $precioMCuatro;  
    public $imagen;
    public $tags; 
    public $precioMCinco;
    

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->detalles = $args['detalles'] ?? '';
        $this->precioPublico = $args['precioPublico'] ?? '';
        $this->precioMUno = $args['precioMUno'] ?? '';
        $this->precioMDos = $args['precioMDos'] ?? '';
        $this->precioMTres = $args['precioMTres'] ?? '';
        $this->precioMCuatro = $args['precioMCuatro'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->tags = $args['tags'] ?? ''; 
        $this->precioMCinco = $args['precioMCinco'] ?? ''; 

    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->detalles) {
            self::$alertas['error'][] = 'El detalle es Obligatorio';
        }
        if(!$this->precioPublico) {
            self::$alertas['error'][] = 'El Campo Ciudad es Obligatorio';
        }
        if(!$this->precioMUno) {
            self::$alertas['error'][] = 'El Campo es Obligatorio';
        }
        if(!$this->precioMDos) {
            self::$alertas['error'][] = 'El Campo es Obligatorio';
        }
        if(!$this->precioMTres) {
            self::$alertas['error'][] = 'El Campo es Obligatorio';
        }
        if(!$this->precioMCuatro) {
            self::$alertas['error'][] = 'El Campo es Obligatorio';
        }
        if(!$this->imagen) {
            self::$alertas['error'][] = 'La imagen es obligatoria';
        }
        if(!$this->tags) {
            self::$alertas['error'][] = 'El Campo marca es obligatorio';
        } 
        if(!$this->precioMCinco) {
            self::$alertas['error'][] = 'El Campo es Obligatorio';
        }
    
        return self::$alertas;
    }
}