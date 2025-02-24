<?php namespace App\Http\Controllers\Auth;

      use Main\Core\Controller;

class PanelController extends Controller
{
      public function index()
      {
            if(!auth()->check())
                  return redirect('/auth/login');
            return $this->render('user.index');
      }
}