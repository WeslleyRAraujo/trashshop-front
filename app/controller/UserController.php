<?php

namespace App\Controller;

class UserController
{
    public function profile()
    {
        if(!isset($_SESSION['session_logged'])) {
            header('location: /login'); exit();
        }
        
        return view('profile', [
            'title' => 'Perfil',
            'breadcrumb' => ['Trash Shop', 'Perfil']
        ]);
    }

    public function user() {
        return view('user');
    }
}