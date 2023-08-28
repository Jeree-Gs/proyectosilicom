<?php

namespace Controllers;
use Model\Proveedor;

class APIProveedores {
    
    public static function index() {
        $proveedores = Proveedor::all();
        echo json_encode($proveedores);

    }
}