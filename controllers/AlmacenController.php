<?php

namespace Controllers;

use MVC\Router;

class AlmacenController {

    public static function index(Router $router) {
        $router->render('admin/almacen/index', [
            'titulo' => 'Almacen'
        ]);
    }
}