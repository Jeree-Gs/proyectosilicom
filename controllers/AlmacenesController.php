<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Almacen;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class AlmacenesController {

    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) { //Controlar la paginacion
            header('Location: /admin/almacenes?page=1');
        }

        $registros_por_pagina = 5;
        $total = Almacen::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/almacenes?page=1');
        }

        $almacenes = Almacen::paginar($registros_por_pagina, $paginacion->offset());

       
        $router->render('admin/almacenes/index', [
            'titulo' => 'Productos',
            'almacenes' => $almacenes,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router) {
        if(!is_admin()) {
            header('Location: /login'); //Validacion
        }


        $alertas = [];
        $almacen = new Almacen;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                 header('Location: /login'); //Validacion
            }

           // Leer imagen
           if(!empty($_FILES['imagen']['tmp_name'])) { //verificar si existe una imagen
                
                $carpeta_imagenes = '../public/img/almacenes';

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
            
            $almacen->sincronizar($_POST);

            //validar
            $alertas = $almacen->validar();

            //guardar el registro
            if(!empty($alertas)) {

                //guardar las imagenes
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");

                // Guardar en la BD
                $resultado = $almacen->guardar();

                if($resultado) {
                    header('Location: /admin/almacenes');
                }
            }
        }

        $router->render('admin/almacenes/crear', [
            'titulo' => 'Registrar Producto', 
            'alertas' => $alertas,
            'almacen' => $almacen
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
            header('Location: /admin/almacenes');
        }
        

        //obtener producto a Editar
        $almacen = Almacen::find($id); //find devuelve los valores ActiveRecord

        if(!$almacen) {
            header('Location: /admin/almacenes');
        }

        $almacen->imagen_actual = $almacen->imagen;

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
                $_POST['imagen'] = $almacen->imagen_actual;
            }

            $almacen->sincronizar($_POST);

            $alertas = $almacen->validar();

            if(empty($alertas)) {
                if(isset($nombre_imagen)) {
                    //guardar las imagenes
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                }

                $resultado = $almacen->guardar();

                if($resultado) {
                    header('Location: /admin/almacenes');
                }
            }

        }

        $router->render('admin/almacenes/editar', [
            'titulo' => 'Actualizar Producto', 
            'alertas' => $alertas,
            'almacen' => $almacen
        ]);
    }

    public static function eliminar(Router $router) {
        if(!is_admin()) {
            header('Location: /login'); //Validacion
        }


        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $almacen = Almacen::find($id);

            if(!isset($almacen) ) {
                header('Location: /admin/almacenes');
            }

            $resultado = $almacen->eliminar();
            
            if($resultado) {
                header('Location: /admin/almacenes');
            }

        }
        
    }
}