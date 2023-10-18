<?php

namespace Controllers;
use MVC\Router;
use Model\Tienda;
use Model\Categoria;


class PaginasController {
    public static function index(Router $router) {
// Obtener todos la tienda
$tiendas = Tienda::all();
        $tiendas_formateados = [];
        foreach($tiendas as $tienda) {
                $tienda->categoria = Categoria::find($tienda->categoria_id);

            if($tienda->categoria_id === "1") {
                $tiendas_formateados['Camaras'][] = $tienda;
            }
            if($tienda->categoria_id === "2") {
                $tiendas_formateados['VideoPorteros'][] = $tienda;
            }
        }

        // Obtener el total de cada bloque
        $tiendas_total = Tienda::total();
        $camaras_total = Tienda::total('categoria_id', 1);
        $videoporteros_total = Tienda::total('categoria_id', 2);

        // Obtener todos la tienda
        $tiendas = Tienda::all();
        
        $router->render('paginas/index', [
            'titulo' => 'Inicio',
            'tiendas' => $tiendas_formateados,
            'tiendas_total' => $tiendas_total,
            'camaras_total' => $camaras_total,
            'videoporteros_total' => $videoporteros_total
        ]);
    }

    public static function conocenos(Router $router) {

        $router->render('paginas/conocenos', [
            'titulo' => 'Conócenos',
        ]);
    }

    public static function contactanos(Router $router) {
        $router->render('paginas/contactanos', [
            'titulo' => 'Contáctanos'
        ]);
    }

    public static function nuestrosProductos(Router $router ) {
        $router->render('paginas/nuestrosProductos', [
            'titulo' => 'P'
        ]);
        
    }
}