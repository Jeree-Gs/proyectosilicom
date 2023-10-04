<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Venta;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class VentasController {

    public static function index(Router $router) {
        
        $router->render('admin/ventas/index', [
            'titulo' => 'Registrar Venta'
        ]);
    }

}