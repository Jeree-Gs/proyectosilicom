<?php

namespace Controllers;
use MVC\Router;
use Model\Tienda;
use Model\Categoria;


class UsersController {
    public static function nuestrosProductos(Router $router ) {
        $router->render('usuarios/nuestrosProductos', [
            'titulo' => 'P'
        ]);
        
    }
}