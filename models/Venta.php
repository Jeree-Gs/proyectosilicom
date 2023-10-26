<?php

namespace Model;

class Venta extends ActiveRecord {
    protected static $tabla = 'ventas';
    protected static $columnasDB = ['id', 'monto_total', 'id_cliente', 'created_at'];

    public $id;
    public $monto_total;
    public $id_cliente;
    public $created_at;    

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->monto_total = $args['monto_total'] ?? '';
        $this->id_cliente = $args['id_cliente'] ?? '';
        $this->created_at = $args['created_at'] ?? '';

    }

    public function validar() {
        // if(!$this->nombre) {
        //     self::$alertas['error'][] = 'El Nombre es Obligatorio';
        // }       
    
        // return self::$alertas;
    }

    public static function procesarVenta($data)
    {
        
        return ['data' => $data];
    }
}