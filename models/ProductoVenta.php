<?php

namespace Model;

class ProductoVenta extends ActiveRecord {
    protected static $tabla = 'producto_ventas';
    protected static $columnasDB = ['id', 'id_ventas', 'id_producto'];

    public $id;
    public $id_ventas;
    public $id_producto;    

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->id_ventas = $args['id_ventas'] ?? '';
        $this->id_producto = $args['id_producto'] ?? '';

    }
}