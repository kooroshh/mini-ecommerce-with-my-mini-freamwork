<?php namespace  App\Http\Controllers\Auth;

use App\Models\User;
use Main\Core\Controller;
use Main\Core\Request;

class RegisterController extends Controller
{

    public function registerView()
    {
        return $this->render("auth.register");
    }

    public function register()
    {

        $validation = $this->validate(request()->all(),[
            "name" => "required|min:5|max:255",
            "email" => "required|email|max:255|unique:users,email",
            "password" => "required|min:5|max:255",
            "confirm_password" => "required|same:password|max:255",
        ],[
            "name:required" => "Name Cant Be Empty",
            "name:min" => "Name Cant Be Lower Than 5",
            "name:max" => "Name Cant Be Bigger Than 255",
            "email:email" => "Email Is Wrong",
            "email:required" => "Email Cant Be Empty",
            "email:max" => "Email Cant Be Bigger Than 255",
            "email:unique" => "Email Already Used",
            "password:required" => "Password Cant Be Empty",
            "password:min" => "Password Cant Be Lower Than 5",
            "password:max" => "Confirm Password Cant Be Bigger Than 255",
            "confirm_password:required" => "Confirm Password Cant Be Empty",
            "confirm_password:same" => "Confirm Password Is Wrong",
            "confirm_password:max" => "Confirm Password Cant Be Bigger Than 255",
        ]);

        if ($validation->fails()) {
            return redirect("/auth/register");
        }

        $model = new User();

        $userData = $validation->getValidatedData();

        unset($userData['confirm_password']);

        $model->create([
            ...$userData,
            'password' => password_hash($userData['password'], PASSWORD_DEFAULT),
        ]);


    }

}