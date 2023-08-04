<?php

namespace Controllers;

use MVC\Router;

class CategoriasController {

    public static function index(Router $router) {
        $router->render('admin/categorias/index', [
            'titulo' => 'Categorias'
        ]);
    }
}