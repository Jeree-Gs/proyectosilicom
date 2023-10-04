<?php

namespace Model;

class Cliente extends ActiveRecord {
    protected static $tabla = 'clientes';
    protected static $columnasDB = ['id', 'nit', 'nombre', 'apellido', 'segundoApellido', 'celular' ];

    public $id;
    public $nit;
    public $nombre;
    public $apellido;
    public $segundoApellido;
    public $celular;
    
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nit = $args['nit'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->segundoApellido = $args['segundoApellido'] ?? '';
        $this->celular = $args['celular'] ?? '';

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
        if(!$this->segundoApellido) {
            self::$alertas['error'][] = 'El Campo Ciudad es Obligatorio';
        }
        if(!$this->celular) {
            self::$alertas['error'][] = 'El Campo Ciudad es Obligatorio';
        }
    
        return self::$alertas;
    }
}

