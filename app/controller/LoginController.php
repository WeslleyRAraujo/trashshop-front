<?php

namespace App\Controller;
use App\Classes\TrashShop;
use Afterimage\Session;

class LoginController
{
    public function index()
    {
        if(isset($_SESSION['session_logged']) && $_SESSION['session_logged'] == true) {
            header('location: /'); exit();
        }

        return view('login', [
            'title' => 'Login',
            'breadcrumb' => ['Trash Shop', 'Login']
        ]);
    }

    /**
     * Authenticate user in API
     * 
     * if don't find the user return for view login
     * else create a session for user 
     * 
     * @return void 
     */
    public function auth()
    {
        $email = $_POST['login'];
        $password = $_POST['password'];

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("location: /login"); exit();
        }

        $result = TrashShop::request('TRSP_LOGIN', [
            'email' => $email,
            'password' => $password
        ]);

        if(isset($result['error'])) {
            header("location: /login"); exit();
        }
        
        $jwt_return = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $result['data']['token'])[1]))), true);

        Session::set([
            'session_email' => $jwt_return['sub'],
            'session_logged' => true
        ]);

        header('location:/'); exit();
    }

    public function exit()
    {
        Session::kill();
        header("location:/"); exit();
    }
}