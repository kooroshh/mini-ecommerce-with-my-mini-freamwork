<?php namespace Main\Core\Validations\Rules;

use App\Models\User;
use Rakit\Validation\Rule;

class ExistsRule extends Rule
{
    protected $message = ":attribute :value has been used exists";

    protected $fillableParams = ['table', 'column'];


    public function check($value): bool
    {
        // make sure required parameters exists
        $this->requireParameters(['table', 'column']);

        // getting parameters
        $column = $this->parameter('column');
        $table = $this->parameter('table');

        $data = (new User())->find($value, 'email');
        return !!$data;

    }
}
