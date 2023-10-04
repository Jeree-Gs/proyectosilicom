<?php

namespace Controllers;

use Model\Cliente;
use MVC\Router;
use Classes\Paginacion;

class ClientesController {

    public static function index(Router $router) {

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) { //Controlar la paginacion
            header('Location: /admin/clientes?page=1');
        }

        $registros_por_pagina = 5;
        $total = Cliente::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/proveedores?page=1');
        }

        $clientes = Cliente::paginar($registros_por_pagina, $paginacion->offset());

        if(!is_admin()) {
            header('Location: /login');
        }
       
        $router->render('admin/clientes/index', [
            'titulo' => 'Clientes',
            'clientes' => $clientes,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router) {
        if(!is_admin()) {
            header('Location: /login'); //Validacion
        }


        $alertas = [];
        $cliente = new Cliente;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                 header('Location: /login'); //Validacion
            }

            
            $cliente->sincronizar($_POST);

            //validar
            $alertas = $cliente->validar();

            //guardar el registro
            if(!empty($alertas)) {
                // Guardar en la BD
                $resultado = $cliente->guardar();

                if($resultado) {
                    header('Location: /admin/clientes');
                }
            }
        }

        $router->render('admin/clientes/crear', [
            'titulo' => 'Registrar Cliente', 
            'alertas' => $alertas,
            'cliente' => $cliente
        ]);
    }


    public static function editar(Router $router) {
        if(!is_admin()) {
            header('Location: /login'); //Validacion
        }


        $alertas = [];

        //validar ID
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /admin/clientes');
        }
        

        //obtener producto a Editar
        $cliente = Cliente::find($id); //find devuelve los valores ActiveRecord

        if(!$cliente) {
            header('Location: /admin/clientes');
        }

      /*  $proveedor->imagen_actual = $proveedor->imagen; */

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login'); //Validacion
            }


         /*   if(!empty($_FILES['imagen']['tmp_name'])) { //verificar si existe una imagen
                
                $carpeta_imagenes = '../public/img/productos';

                //Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 8755, true); //crea subdirectorios y no crea la carpeta
                }

                //generar versiones png y webp
                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png', 80); //80 es la calidad
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen = md5( uniqid( rand(), true) ); //hasheamos

                $_POST['imagen'] = $nombre_imagen;
            } else {
                $_POST['imagen'] = $proveedor->imagen_actual;
            } */

            $cliente->sincronizar($_POST);

            $alertas = $cliente->validar();

            if(empty($alertas)) {
               /* if(isset($nombre_imagen)) {
                    //guardar las imagenes
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                } */

                $resultado = $cliente->guardar();

                if($resultado) {
                    header('Location: /admin/clientes');
                }
            }

        }

        $router->render('admin/clientes/editar', [
            'titulo' => 'Actualizar Cliente', 
            'alertas' => $alertas,
            'cliente' => $cliente
        ]);
    }

    public static function eliminar(Router $router) {
        if(!is_admin()) {
            header('Location: /login'); //Validacion
        }
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $cliente = Cliente::find($id);

            if(!isset($cliente) ) {
                header('Location: /admin/clientes');
            }
            $resultado = $cliente->eliminar();
            if($resultado) {
                header('Location: /admin/clientes');
            }

        }
        
    }
}
