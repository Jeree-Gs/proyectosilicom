<?php

namespace Controllers;

use Model\Cliente;

class APIClientes
{
    public static function index()
    {
        $clientes = Cliente::all();
        echo json_encode($clientes);
    }

    public static function obtenerClientePorNIT()
    {
        $nit = $_GET['nit'];
        $nit = filter_var($nit, FILTER_VALIDATE_INT);
        $cliente = Cliente::where('nit', $nit);
        echo json_encode($cliente);
    }
}
