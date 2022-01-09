<?php

namespace App\Controller;

class LoginController
{
    public function index()
    {
        return view('login', [
            'title' => 'Login',
            'breadcrumb' => ['Trash Shop', 'Login']
        ]);
    }

    public function auth()
    {
        echo "autenticando";
    }

    public function exit()
    {
        echo "saindo";
    }
}