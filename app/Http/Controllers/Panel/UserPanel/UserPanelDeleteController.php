<?php namespace App\Http\Controllers\Panel\UserPanel;

use App\Models\User;
use Main\Core\Controller;

class UserPanelDeleteController extends Controller
{

    public function deleteView()
    {
        if(!auth()->check())
            return redirect('/auth/sign-in');


        return $this->render('user.panel.delete.delete', [

        ]);
    }

    public function delete()
    {

        if(!auth()->check())
            return redirect('/auth/sign-in');

        $userId = auth()->user()->id;

        (new User())->delete($userId);

        return redirect("/auth/sign-in");
    }


}