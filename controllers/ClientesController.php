<?php

namespace Controllers;

use MVC\Router;

class ClientesController {

    public static function index(Router $router) {
        $router->render('admin/clientes/index', [
            'titulo' => 'Clientes'
        ]);
    }
}