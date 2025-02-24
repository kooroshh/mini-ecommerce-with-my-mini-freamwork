<?php namespace  App\Http\Controllers\Auth;

use App\Models\User;
use Main\Core\Controller;
use Main\Core\Request;

class RegisterController extends Controller
{

    public function registerView(array $data = [])
    {
        return $this->render("auth.register", $data);
    }

    public function register()
    {
        dd(request()->all());


    }

}