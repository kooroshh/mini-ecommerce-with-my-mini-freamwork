<?php namespace App\Http\Controllers\Panel\UserPanel;

use App\Models\User;
use Main\Core\Controller;

class UserPanelChangePasswordController extends Controller
{

    public function changePasswordView()
    {
        if(!auth()->check())
            return redirect('/auth/sign-in');



        return $this->render('user.panel.change-password.change-password', [

        ]);
    }

    public function changePassword()
    {

        if(!auth()->check())
            return redirect('/auth/sign-in');

        $validation = $this->validate(request()->all(),[
            "password" => "required|min:5|max:191",
            "confirm_password" => "required|same:password|max:191",
        ],[
            "password:required" => "Password Cant Be Empty",
            "password:min" => "Password Cant Be Lower Than 5",
            "password:max" => "Confirm Password Cant Be Bigger Than 191",
            "confirm_password:required" => "Confirm Password Cant Be Empty",
            "confirm_password:same" => "Confirm Password Is Wrong",
            "confirm_password:max" => "Confirm Password Cant Be Bigger Than 191",
        ]);

        if ($validation->fails()) {
            return redirect("/panel/change-password");
        }

        
        $userData = $validation->getValidatedData();

        unset($userData['confirm_password']);
        $userId = auth()->user()->id;

        (new User)->update($userId, [
            'password' => password_hash($userData['password'], PASSWORD_DEFAULT),
        ]);


        return redirect("/panel");

    }


}