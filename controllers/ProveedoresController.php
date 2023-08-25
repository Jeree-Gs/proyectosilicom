<?php

namespace Controllers;

use Model\Proveedor;
use MVC\Router;
use Classes\Paginacion;

class ProveedoresController {

    public static function index(Router $router) {

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) { //Controlar la paginacion
            header('Location: /admin/proveedores?page=1');
        }

        $registros_por_pagina = 5;
        $total = Proveedor::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/proveedores?page=1');
        }

        $proveedores = Proveedor::paginar($registros_por_pagina, $paginacion->offset());

        if(!is_admin()) {
            header('Location: /login');
        }
       
        $router->render('admin/proveedores/index', [
            'titulo' => 'Proveedores',
            'proveedores' => $proveedores,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router) {
        if(!is_admin()) {
            header('Location: /login'); //Validacion
        }


        $alertas = [];
        $proveedor = new Proveedor;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                 header('Location: /login'); //Validacion
            }

            
            $proveedor->sincronizar($_POST);

            //validar
            $alertas = $proveedor->validar();

            //guardar el registro
            if(!empty($alertas)) {
                // Guardar en la BD
                $resultado = $proveedor->guardar();

                if($resultado) {
                    header('Location: /admin/proveedores');
                }
            }
        }

        $router->render('admin/proveedores/crear', [
            'titulo' => 'Registrar Producto', 
            'alertas' => $alertas,
            'proveedor' => $proveedor
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
            header('Location: /admin/proveedores');
        }
        

        //obtener producto a Editar
        $proveedor = Proveedor::find($id); //find devuelve los valores ActiveRecord

        if(!$proveedor) {
            header('Location: /admin/proveedores');
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

            $proveedor->sincronizar($_POST);

            $alertas = $proveedor->validar();

            if(empty($alertas)) {
               /* if(isset($nombre_imagen)) {
                    //guardar las imagenes
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                } */

                $resultado = $proveedor->guardar();

                if($resultado) {
                    header('Location: /admin/proveedores');
                }
            }

        }

        $router->render('admin/proveedores/editar', [
            'titulo' => 'Actualizar Proveedor', 
            'alertas' => $alertas,
            'proveedor' => $proveedor
        ]);
    }

    public static function eliminar(Router $router) {
        if(!is_admin()) {
            header('Location: /login'); //Validacion
        }
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $proveedor = Proveedor::find($id);

            if(!isset($proveedor) ) {
                header('Location: /admin/proveedores');
            }
            $resultado = $proveedor->eliminar();
            if($resultado) {
                header('Location: /admin/proveedores');
            }

        }
        
    }
}
