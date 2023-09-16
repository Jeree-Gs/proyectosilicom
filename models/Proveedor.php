<?php

namespace Model;

class Proveedor extends ActiveRecord {
    protected static $tabla = 'proveedores';
    protected static $columnasDB = ['id', 'nombre', 'direccion', 'telefono' ];

    public $id;
    public $nombre;
    public $direccion;
    public $telefono;
    
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->telefono = $args['telefono'] ?? '';

    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->direccion) {
            self::$alertas['error'][] = 'El detalle es Obligatorio';
        }
        if(!$this->telefono) {
            self::$alertas['error'][] = 'El Campo Ciudad es Obligatorio';
        }
        
    
        return self::$alertas;
    }
}

