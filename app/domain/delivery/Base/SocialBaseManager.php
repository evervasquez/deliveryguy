<?php
/**
 * Created by PhpStorm.
 * User: eveR
 * Date: 20/02/15
 * Time: 23:30
 */

namespace domain\delivery\Base;


abstract class SocialBaseManager
{

    protected $input;

    protected $errors;

    abstract function getRules();

    public function __construct($input)
    {
        $this->input = $input;
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