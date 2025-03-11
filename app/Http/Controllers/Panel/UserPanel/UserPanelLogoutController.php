<?php namespace App\Http\Controllers\Panel\UserPanel;

use App\Models\User;
use Main\Core\Controller;

class UserPanelLogoutController extends Controller
{

    public function logoutView()
    {
        if(!auth()->check())
            return redirect('/auth/sign-in');


        return $this->render('user.panel.logout.logout', [

        ]);
    }

    public function logout()
    {

        if(!auth()->check())
            return redirect('/auth/sign-in');

        auth()->logout();


        return redirect("/auth/sign-in");
    }


}