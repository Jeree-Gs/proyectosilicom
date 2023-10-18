<?php

namespace Model;

class Tienda extends ActiveRecord {
    protected static $tabla = 'tiendas';
    protected static $columnasDB = ['id', 'nombre', 'detalles', 'precio', 'imagen', 'tags', 'categoria_id', 'precioMCinco' ];

    public $id;
    public $nombre;
    public $detalles;
    public $precio;
    public $imagen;
    public $tags;
    public $categoria_id;
    public $precioMCinco;
    
    

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->detalles = $args['detalles'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->tags = $args['tags'] ?? ''; 
        $this->categoria_id = $args['categoria_id'] ?? ''; 
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
        if(!$this->categoria_id  || !filter_var($this->categoria_id, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Elige una Categoría';
        }
        if(!$this->precioMCinco) {
            self::$alertas['error'][] = 'Es Obligatorio';
        }
    
        return self::$alertas;
    }
}

//ESTO ESTA COMENTADO PORQUE DA ERROR, EN LA PARTE DEL FORMULARIO NO LO SUBE A LA LISTA LOS DATOS
//---EL ERROR PARECE SER QUE EN LA PARTE DE 'codigo' NO SUBO NINGUN DATO DESDE EL FORMULARIO

/*
namespace Model;

class Tienda extends ActiveRecord {
    protected static $tabla = 'tiendas';
    protected static $columnasDB = ['id', 'nombre', 'detalles', 'precio', 'imagen', 'tags', 'precioMCinco', 'codigo', 'marca' ];

    public $id;
    public $nombre;
    public $detalles;
    public $precio;
    public $imagen;
    public $tags;
    public $precioMCinco;
    public $codigo;
    public $marca;
    

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->detalles = $args['detalles'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->tags = $args['tags'] ?? ''; 
        $this->precioMCinco = $args['precioMCinco'] ?? ''; 
        $this->codigo = $args['codigo'] ?? ''; 
        $this->marca = $args['marca'] ?? ''; 

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
        
    
        return self::$alertas;
    }
}
*/