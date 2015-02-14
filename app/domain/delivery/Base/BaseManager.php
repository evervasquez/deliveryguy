<?php
/**
 * Created by PhpStorm.
 * User: MacBookPro eveR
 * Date: 04/11/14
 * Time: 01:23 AM
 */

namespace domain\delivery\Base;


abstract class BaseManager
{
    protected $input;

    protected $errors;

    abstract function getRules();

    public function __construct($input = NULL)
    {
        $this->input = $input ?: array_only(\Input::all(), array_keys($this->getRules()));;
    }

    public function passes()
    {
        $validation = \Validator::make($this->input, $this->getRules());

        if ($validation->passes()) return true;

        $this->errors = $validation->messages();

        return false;
    }

    public function getErrors()
    {
        return $this->errors;
    }
} 