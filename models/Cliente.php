<?php

namespace Model;

class Cliente extends ActiveRecord {
    protected static $tabla = 'clientes';
    protected static $columnasDB = ['id', 'nit', 'nombre', 'apellido','telefono', 'segundoApellido', 'precioMC'];

    public $id;
    public $nit;
    public $nombre;
    public $apellido;
    public $telefono;
    public $segundoApellido;
    public $precioMC;
    
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nit = $args['nit'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->segundoApellido = $args['segundoApellido'] ?? '';
        $this->precioMC = $args['precioMC'] ?? '';

    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->nit) {
            self::$alertas['error'][] = 'El detalle es Obligatorio';
        }
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Campo Ciudad es Obligatorio';
        }
        if(!$this->apellido) {
            self::$alertas['error'][] = 'El Campo Ciudad es Obligatorio';
        }
        if(!$this->telefono) {
            self::$alertas['error'][] = 'El Campo Ciudad es Obligatorio';
        }
        if(!$this->segundoApellido) {
            self::$alertas['error'][] = 'El Campo Ciudad es Obligatorio';
        }
        if(!$this->precioMC) {
            self::$alertas['error'][] = 'El Campo Ciudad es Obligatorio';
        }
        
    
        return self::$alertas;
    }
}

