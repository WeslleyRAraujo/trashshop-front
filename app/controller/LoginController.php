<?php

namespace App\Controller;
use App\Classes\Log;
use App\Classes\User;
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
            $_SESSION['error_login'] = 'Formato de email inválido.';
            header("location: /login"); exit();
        }

        $result = User::login($email, $password);

        if(isset($result['error'])) {
            $_SESSION['error_login'] = 'Email ou senha inválidos.';
            header("location: /login"); exit();
        }

        if(is_null($result)) {
            Log::write("Não foi possível realizar o login, erro de conexão com a API, endpoint: 'https://trash.gigalixirapp.com/api/v1/login';");
            $_SESSION['error_login'] = 'Ops, houve um erro de conexão com o servidor :(';
            header("location: /login"); exit();
        }
        
        $jwt_return = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $result['data']['token'])[1]))), true);

        Session::set([
            'session_id' => $jwt_return['sub'],
            'session_token' =>  $result['data']['token'],
            'session_logged' => true,
            'session_start_login' => time()
        ]);

        \App\Classes\Session::setLifeTime(600);

        header('location:/'); exit();
    }

    public function exit()
    {
        Session::kill();
        header("location: /login"); exit();
    }

    /**
     * echo the session time left in json format
     * 
     * @return void
     */
    public function sessionTime()
    {
        if(isset($_SESSION['session_logout_time'])) {
            header('Content-Type: application/json');
            echo json_encode(
                [date('i:s', $_SESSION['session_logout_time'] - time())]
            );
        } else {
            echo json_encode(['']);
        }
    }
}