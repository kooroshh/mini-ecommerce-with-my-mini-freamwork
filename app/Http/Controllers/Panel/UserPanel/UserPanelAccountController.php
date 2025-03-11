<?php namespace App\Http\Controllers\Panel\UserPanel;

use App\Models\User;
use Main\Core\Controller;

class UserPanelAccountController extends Controller
{

    public function accountView()
    {
        if(!auth()->check())
            return redirect('/auth/sign-in');

        $user = auth()->user();

        return $this->render('user.panel.account.account', [
            "user" => $user,
        ]);
    }

    public function accountEdit()
    {

        if(!auth()->check())
            return redirect('/auth/sign-in');

        
        $data = request()->all();

        $validation = $this->validate($data + $_FILES,[
            "name" => "required|min:5|max:191",
            "image" => "uploaded_file:0,500K,png,jpeg,jpg",
        ],[
            "name:required" => "Name Cant Be Empty",
            "name:min" => "Name Cant Be Lower Than 5",
            "name:max" => "Name Cant Be Bigger Than 191",
            "image:uploaded_file" => "Image Should Be A Image",
            "image:mimes" => "Image Should Be A Valid Type (png,jpeg,jpg)",
            "image:max" => "Image Cant Be Bigger Than 500K",
            "image:min" => "Image Cant Be Lower Than 0",

        ]);

        if ($validation->fails()) {
            return redirect("/panel");
        }

        $userData = $validation->getValidatedData(); 
        $userId = auth()->user()->id;


        if($userData['image']['name'] == '')
        {
            unset($userData['image']);
        }else
        {
            saveImage($userData['image'], "users/$userId");
            $userData['image'] = $userId . "/" . $userData['image']['name'];
        }

        (new User())->update($userId, [
            ...$userData
        ]);
        


        return redirect("/panel");

    }


}