<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Tienda;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Categoria;

class TiendasController {

    public static function index(Router $router) {

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) { //Controlar la paginacion
            header('Location: /admin/tiendas?page=1');
        }

        $registros_por_pagina = 5;
        $total = Tienda::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/tiendas?page=1');
        }

        $tiendas = Tienda::paginar($registros_por_pagina, $paginacion->offset());

        if(!is_admin()) {
            header('Location: /login');
        }
       
        $router->render('admin/tiendas/index', [
            'titulo' => 'Tienda En Línea',
            'tiendas' => $tiendas,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router) {
        if(!is_admin()) {
            header('Location: /login'); //Validacion
        }


        $alertas = [];
        $tienda = new Tienda;

        $categorias = Categoria::all();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                 header('Location: /login'); //Validacion
            }

           // Leer imagen
           if(!empty($_FILES['imagen']['tmp_name'])) { //verificar si existe una imagen
                
                $carpeta_imagenes = '../public/img/tiendas';

                //Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 8755, true ); //crea subdirectorios y no crea la carpeta
                }

                //generar versiones png y webp
                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png', 80); //80 es la calidad
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen = md5( uniqid( rand(), true) ); //hasheamos

                $_POST['imagen'] = $nombre_imagen;
        }
            
            $tienda->sincronizar($_POST);

            //validar
            $alertas = $tienda->validar();

            //guardar el registro
            if(!empty($alertas)) {

                //guardar las imagenes
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");

                // Guardar en la BD
                $resultado = $tienda->guardar();

                if($resultado) {
                    header('Location: /admin/tiendas');
                }
            }
        }

        $router->render('admin/tiendas/crear', [
            'titulo' => 'Registrar Producto a la Tienda', 
            'alertas' => $alertas,
            'tienda' => $tienda,
            'categorias' => $categorias
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
            header('Location: /admin/tiendas');
        }
        

        //obtener producto a Editar
        $tienda = Tienda::find($id); //find devuelve los valores ActiveRecord

        if(!$tienda) {
            header('Location: /admin/tiendas');
        }

        $tienda->imagen_actual = $tienda->imagen;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login'); //Validacion
            }


            if(!empty($_FILES['imagen']['tmp_name'])) { //verificar si existe una imagen
                
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
                $_POST['imagen'] = $tienda->imagen_actual;
            }

            $tienda->sincronizar($_POST);

            $alertas = $tienda->validar();

            if(empty($alertas)) {
                if(isset($nombre_imagen)) {
                    //guardar las imagenes
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                }

                $resultado = $tienda->guardar();

                if($resultado) {
                    header('Location: /admin/tiendas');
                }
            }

        }

        $router->render('admin/tiendas/editar', [
            'titulo' => 'Actualizar Producto', 
            'alertas' => $alertas,
            'tienda' => $tienda
        ]);
    }

    public static function eliminar(Router $router) {
        if(!is_admin()) {
            header('Location: /login'); //Validacion
        }


        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $tienda = Tienda::find($id);

            if(!isset($tienda) ) {
                header('Location: /admin/tiendas');
            }

            $resultado = $tienda->eliminar();
            
            if($resultado) {
                header('Location: /admin/tiendas');
            }

        }
        
    }
}