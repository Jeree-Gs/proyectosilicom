<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;
use Classes\Paginacion;

class UsuariosController {

    public static function index(Router $router) {

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) { //Controlar la paginacion
            header('Location: /admin/usuarios?page=1');
        }

        $registros_por_pagina = 5;
        $total = Usuario::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/usuarios?page=1');
        }

        $usuarios = Usuario::paginar($registros_por_pagina, $paginacion->offset());

        if(!is_admin()) {
            header('Location: /login');
        }
       
        $router->render('admin/usuarios/index', [
            'titulo' => 'Usuarios',
            'usuarios' => $usuarios,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router) {
        if(!is_admin()) {
            header('Location: /login'); //Validacion
        }


        $alertas = [];
        $usuario = new Usuario;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                 header('Location: /login'); //Validacion
            }

            
            $usuario->sincronizar($_POST);

            //validar
            $alertas = $usuario->validar();

            //guardar el registro
            if(!empty($alertas)) {
                // Guardar en la BD
                $resultado = $usuario->guardar();

                if($resultado) {
                    header('Location: /admin/usuarios');
                }
            }
        }

        $router->render('admin/usuarios/crear', [
            'titulo' => 'Registrar Producto', 
            'alertas' => $alertas,
            'usuario' => $usuario
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
            header('Location: /admin/usuarios');
        }
        

        //obtener producto a Editar
        $usuario = Usuario::find($id); //find devuelve los valores ActiveRecord

        if(!$usuario) {
            header('Location: /admin/usuarios');
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

            $usuario->sincronizar($_POST);

            $alertas = $usuario->validar();

            if(empty($alertas)) {
               /* if(isset($nombre_imagen)) {
                    //guardar las imagenes
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                } */

                $resultado = $usuario->guardar();

                if($resultado) {
                    header('Location: /admin/usuarios');
                }
            }

        }

        $router->render('admin/usuarios/editar', [
            'titulo' => 'Actualizar usuario', 
            'alertas' => $alertas,
            'usuario' => $usuario
        ]);
    }

    public static function eliminar(Router $router) {
        if(!is_admin()) {
            header('Location: /login'); //Validacion
        }
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $usuario = Usuario::find($id);

            if(!isset($usuario) ) {
                header('Location: /admin/usuarios');
            }
            $resultado = $usuario->eliminar();
            if($resultado) {
                header('Location: /admin/usuarios');
            }

        }
        
    }
}