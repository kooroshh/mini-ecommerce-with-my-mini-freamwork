<?php namespace App\Http\Controllers\Auth\Panel\AdminPanel\Tools;

use App\Models\User;
use Main\Core\Controller;

class AdminPanelAddUserToolController extends Controller
{
    public function addUserView()
    {


        if(!isAdmin())
            return $this->render("errors.404");


        return $this->render("user.admin-panel.tools.add-user-tool",[
        ]);
    }

    public function addUser()
    {
        if(!isAdmin())
            return $this->render("errors.404");


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
            return redirect("/admin-panel/users/add");
        }


        $userData = $validation->getValidatedData();

        unset($userData['confirm_password']);

        (new User())->create([
            ...$userData,
            'password' => password_hash($userData['password'], PASSWORD_DEFAULT),
        ]);

        return redirect("/admin-panel/users");
    }

}