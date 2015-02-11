<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 04/11/14
 * Time: 01:23 AM
 */

namespace domain\delivery\Base;


abstract class BaseManager
{
    protected $data;
    protected $errors;

    public function __construct($datos)
    {
        $this->data = array_only($datos, array_keys($this->getRules()));
    }

    abstract public function getRules();

    public function isValid()
    {
        //recuperamos todas las reglas
        $rules = $this->getRules();

        $validation = \Validator::make($this->data, $rules);

        //true si pasa
        $isValid = $validation->passes();

        //mensajes de error
        $this->errors = $validation->messages();

        return $isValid;
    }

    //retornamos los errors
    public function getErros()
    {
        return $this->errors;
    }
} 