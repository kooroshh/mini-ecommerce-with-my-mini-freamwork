<?php namespace Main\Core;

use Main\Core\Validations\Rules\UniqueRule;
use Rakit\Validation\Validation;
use Rakit\Validation\Validator;



class Controller
{
    public function validate($data, $rule, array $messages = [])  : Validation
    {
        $validator = new Validator($messages);

        $validator->addValidator('unique', new UniqueRule);

        $validation = $validator->make($data, $rule);

        $validation->validate();

        if($validation->fails())
        {
            response()
                    ->withErrors($validation->errors())
                    ->withInputs();
        }

        return $validation;
    }

    public function render(string $route, array $data = [])
    {
        return (app()->view)->render($route , $data);
    }
}
