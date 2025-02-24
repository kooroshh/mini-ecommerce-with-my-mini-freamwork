<?php namespace Main\Core;

      use App\Models\User;

class Auth
{
    public function check() : bool
    {
        return session()->get("user_id");
    }

    public function login(int $userId) : void
    {
        session()->set('user_id', $userId);
    }

    public function logout()
    {
        session()->remove('user_id');
    }

    public function user()
    {
        return (new User)->find(session()->get("user_id"));
    }
}
