<?php

namespace App\Controller;

class UserController
{
    public function indexLogin()
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }
}