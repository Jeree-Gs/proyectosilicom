<?php

namespace Controllers;

use MVC\Router;

class ProovedoresController {

    public static function index(Router $router) {
        $router->render('admin/proovedores/index', [
            'titulo' => 'Proovedores'
        ]);
    }
}