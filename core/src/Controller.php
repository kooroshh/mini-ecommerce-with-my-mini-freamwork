<?php namespace Main\Core;

use Rakit\Validation\Validation;
use Rakit\Validation\Validator;


class Controller
{
    public function validate($data, $rule, array $messages = [])  : Validation
    {
        $validator = new Validator($messages);


        $validation = $validator->make($data, $rule);

        $validation->validate();

        return $validation;
    }

    public function render(string $route, array $data = [])
    {
        return (new View)->render($route , $data);
    }
}
