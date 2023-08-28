<?php

namespace Controllers;
use MVC\Router;

class PaginasController {
    public static function index(Router $router) {

        $router->render('paginas/index', [
            'titulo' => 'Inicio'
        ]);
    }

    public static function conocenos(Router $router) {

        $router->render('paginas/conocenos', [
            'titulo' => 'Conocenos'
        ]);
    }

    public static function contactanos(Router $router) {

        $router->render('paginas/contactanos', [
            'titulo' => 'Contactanos'
        ]);
    }
}