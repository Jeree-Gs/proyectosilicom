<?php

namespace Controllers;

use Model\Registro;
use Model\Usuario;
use MVC\Router;

class ReportesController {

    public static function PruebaV(Router $router) {

        $router->render('admin/fpdf/PruebaV.php', [
            'titulo' => 'Panel de Administración',
        ]);
    }
}