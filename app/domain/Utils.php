<?php
/**
 * Created by PhpStorm.
 * User: eveR
 * Date: 12/02/15
 * Time: 16:08
 */

namespace domain;


class Utils {
    public static function objectToArray($object)
    {
        $array = array();
        foreach ($object as $member => $data) {
            $array[$member] = $data;
        }
        return $array;
    }

    public static function ArrayObjetctToArray($datos)
    {
        $array = array();
        $count = 0;
        for ($i = 0; $i < count($datos); $i++) {
            $childObjetcs = $datos[$i];
            foreach ($childObjetcs as $member => $data) {
                $array[$count][$member] = $data;
            }
            $count++;
        }
        return $array;
    }

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

    public static function quitarAcentos($text)
    {
        $text = htmlentities($text, ENT_QUOTES, 'UTF-8');
        $text = strtolower($text);
        $patron = array (
            // Espacios, puntos y comas por guion
            '/[\., ]+/' => '-',

            // Vocales
            '/&agrave;/' => 'a',
            '/&egrave;/' => 'e',
            '/&igrave;/' => 'i',
            '/&ograve;/' => 'o',
            '/&ugrave;/' => 'u',

            '/&aacute;/' => 'a',
            '/&eacute;/' => 'e',
            '/&iacute;/' => 'i',
            '/&oacute;/' => 'o',
            '/&uacute;/' => 'u',

            '/&acirc;/' => 'a',
            '/&ecirc;/' => 'e',
            '/&icirc;/' => 'i',
            '/&ocirc;/' => 'o',
            '/&ucirc;/' => 'u',

            '/&atilde;/' => 'a',
            '/&etilde;/' => 'e',
            '/&itilde;/' => 'i',
            '/&otilde;/' => 'o',
            '/&utilde;/' => 'u',

            '/&auml;/' => 'a',
            '/&euml;/' => 'e',
            '/&iuml;/' => 'i',
            '/&ouml;/' => 'o',
            '/&uuml;/' => 'u',

            '/&auml;/' => 'a',
            '/&euml;/' => 'e',
            '/&iuml;/' => 'i',
            '/&ouml;/' => 'o',
            '/&uuml;/' => 'u',

            // Otras letras y caracteres especiales
            '/&aring;/' => 'a',
            '/&ntilde;/' => 'n',

            // Agregar aqui mas caracteres si es necesario

        );

        $text = preg_replace(array_keys($patron),array_values($patron),$text);
        return $text;
    }
}