<?php
/**
 * Created by PhpStorm.
 * User: eveR
 * Date: 12/02/15
 * Time: 15:33
 */

namespace domain\utils;


class Cript
{

    public static function dataEncriptar($data)
    {
        $datos = array();
        foreach ($data as $clave => $valor) {
            $datos[base64_encode($clave)] = base64_encode($valor);
        }
        return $datos;
    }

    public static function dataDesencriptar($data)
    {
        $datos = array();
        foreach ($data as $clave => $valor) {
            $datos[base64_decode($clave)] = base64_decode($valor);
        }
        return $datos;
    }
}