<?php

require '../../Librerias/conexion.php';

function errores($msg)
{
    die(json_encode([
        'ERROR' => 'SI',
        'MENSAJE' => $msg
    ]));
}

$funcion = $_POST['funcion'];

if ($funcion == 'cargar_articulos') {
    cargar_articulos();
}

function cargar_articulos()
{
    global $con;

    $buscador = trim($_POST['buscador']);

    $sub_buscador = "";
    if ($buscador != '') {
        $buscadorParse = (int) $buscador;
        $sub_buscador = "AND NOMBRE LIKE '%$buscador%'";
        if ($buscadorParse != 0) {
            $sub_buscador = "AND CLAVEARTICULO = $buscadorParse";
        }
    }

    $sql = "SELECT * FROM articulos WHERE 1 = 1 $sub_buscador";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        errores('Ha ocurrido un error (0)');
    }

    die(json_encode([
        'ERROR' => 'NO',
        'MENSAJE' => 'NO',
        'data' => mysqli_fetch_all($result, MYSQLI_ASSOC)
    ]));
}