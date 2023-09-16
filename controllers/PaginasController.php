<?php

namespace Controllers;
use MVC\Router;
use Model\Tienda;


class PaginasController {
    public static function index(Router $router) {


        // Obtener el total de cada bloque
        $tiendas_total = Tienda::total();

        // Obtener todos la tienda
        $tiendas = Tienda::all();
        
        $router->render('paginas/index', [
            'titulo' => 'Inicio',
            'tiendas_total' => $tiendas_total,
            'tiendas' => $tiendas
        ]);
    }

    public static function conocenos(Router $router) {

        $router->render('paginas/conocenos', [
            'titulo' => 'Conocenos',
        ]);
    }

    public static function contactanos(Router $router) {

        $router->render('paginas/contactanos', [
            'titulo' => 'Contactanos'
        ]);
    }
}