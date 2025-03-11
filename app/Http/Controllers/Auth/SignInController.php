<?php namespace  App\Http\Controllers\Auth;

use App\Models\User;
use Main\Core\Controller;
use Rakit\Validation\ErrorBag;


class SignInController extends Controller
{

    public function singInView()
    {
        if(auth()->check())
            return redirect('/panel');
        return $this->render('auth.singIn');
    }

    public function singIn()
    {
        if(auth()->check())
            return redirect('/admin-panel');

        $validation = $this->validate(request()->all(),[
            "email" => "required|email|max:191|exist:users,email,is_ban,false",
            "password" => "required|min:5|max:191",
        ],[
            "email:email" => "Email Is Wrong",
            "email:required" => "Email Cant Be Empty",
            "email:max" => "Email Cant Be Bigger Than 191",
            "email:exist" => "Email Is Not exists",
            "password:required" => "Password Cant Be Empty",
            "password:min" => "Password Cant Be Lower Than 5",
            "password:max" => "Confirm Password Cant Be Bigger Than 191",
        ]);

        if ($validation->fails()) {
            return redirect("/auth/sign-in");
        }

        $data = $validation->getValidatedData();

        $user = (new User)->find($data['email'], 'email');

        if(!password_verify($data['password'], $user->password))
        {
            $errors = new ErrorBag();
            $errors->add('password','check-password',"The Information Does not match");
            return redirect("/auth/sign-in")
                    ->withErrors($errors)
                    ->withInputs();
        }

        auth()->login($user->id);

        return redirect('/panel');

    }

    public function logout()
    {
        if(!auth()->check())
            return redirect("/auth/sign-in");
        
        auth()->logout();

        return redirect("/auth/sign-in");
    }

}

