<?php

namespace Controllers;
use Model\Venta;

class APIVentas {

    public static function index() {
        $ventas = Venta::all();
        echo json_encode($ventas);
    }

    public static function venta() {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id || $id < 1) {
            echo json_encode([]);
            return;
        }

        $ponente = Venta::find($id);
        echo json_encode($ponente, JSON_UNESCAPED_SLASHES);
    }
}