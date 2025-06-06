<?php namespace Main\Core;

use Main\Core\Validations\Rules\ExistsRule;
use Main\Core\Validations\Rules\ExistsRuleFalse;
use Main\Core\Validations\Rules\UniqueRule;
use Rakit\Validation\Validation;
use Rakit\Validation\Validator;



class Controller
{
    public function validate($data, $rule, array $messages = [])  : Validation
    {
        $validator = new Validator($messages);

        $validator->addValidator('unique', new UniqueRule);
        $validator->addValidator('exist', new ExistsRule);
        $validator->addValidator('existFalse', new ExistsRuleFalse);

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
