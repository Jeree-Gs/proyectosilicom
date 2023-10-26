<?php

namespace Controllers;
use Model\Venta;
use Model\Almacen;
use Model\ProductoVenta;
use Model\Cliente;

class APIVentas {

    public static function index() {
        $ventas = Venta::all();
        echo json_encode($ventas);
    }

    public static function venta() {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id || $id < 1) {
            echo json_encode([]);
            return;
        }

        $ponente = Venta::find($id);
        echo json_encode($ponente, JSON_UNESCAPED_SLASHES);
    }

    /**
     * 
     * Este método funciona para método ajax
     * @param = JSON:
     * {
     *      id: 127 // Ejemplo
     * }
     * Devuelve un objeto JSON
     */
    public static function getItemByBarCode()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $productos = Almacen::where('codigoBarra', $request['codigo']);
        echo json_encode($productos);
    }

    public static function procesarVenta()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $venta = new Venta();
        $venta->monto_total = $request['monto_total'];
        $venta->id_cliente = $request['id_cliente'];
        $venta->created_at = $request['fecha'];
        $res = $venta->guardar();
        $status = "success";
        $message = "Venta procesada exitosamente";
        if ($res['resultado']) {
            $productoVenta = new ProductoVenta();
            for ($i=0; $i < count($request['productos']); $i++) { 
                $productoVenta->id_ventas = $res['id'];
                $productoVenta->id_producto = $request['productos'][$i];
                $rs = $productoVenta->guardar();
                if (!$rs['resultado']) {
                    $status = "error";
                    $response = "Hubo un error al guardaar los productos";
                    break;
                }
            }
        }
        else
        {
            $status = "error";
            $response = "Hubo un error al guardar la Venta";
        }
        echo json_encode(['status' => $status, 'message' => $message]);
    }
}