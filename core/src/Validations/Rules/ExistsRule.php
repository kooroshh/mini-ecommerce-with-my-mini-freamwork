<?php namespace Main\Core\Validations\Rules;


use Main\Core\Database\Model;
use Rakit\Validation\Rule;

class ExistsRule extends Rule
{
    protected $message = ":attribute :value has been used exists";

    protected $fillableParams = ['table', 'column', "field", "amount"];


    public function check($value): bool
    {
        // make sure required parameters exists
        $this->requireParameters(['table', 'column']);

        // getting parameters
        $column = $this->parameter('column');
        $table = $this->parameter('table');
        $field = $this->parameter('field');
        $amount = $this->parameter('amount');
        if(!is_null($field))
        {
            $data = (new Model)->from($table)->where($field, $amount)->find($value, $column);
            return !!$data;
        }else
        {
            $data = (new Model)->from($table)->find($value, $column);
        }


        return !$data;
    


    }
}
