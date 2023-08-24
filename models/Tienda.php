<?php

namespace Model;

class Tienda extends ActiveRecord {
    protected static $tabla = 'tiendas';
    protected static $columnasDB = ['id', 'nombre', 'detalles', 'precio', 'imagen', 'tags', 'precioMCinco' ];

    public $id;
    public $nombre;
    public $detalles;
    public $precio;
    public $imagen;
    public $tags;
    public $precioMCinco;
    

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->detalles = $args['detalles'] ?? '';
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
        if(!$this->imagen) {
            self::$alertas['error'][] = 'La imagen es obligatoria';
        }
        if(!$this->tags) {
            self::$alertas['error'][] = 'El Campo marca es obligatorio';
        } 
        if(!$this->precioMCinco) {
            self::$alertas['error'][] = 'Es Obligatorio';
        }
    
        return self::$alertas;
    }
}