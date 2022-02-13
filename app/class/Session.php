<?php

namespace App\Classes;

class Session
{
    public function __construct()
    {
        if(session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    /**
     * Create new values in $_SESSION
     * 
     * @param array $sessionArr, keys and values for create indexes in $_SESSION
     * 
     * @throws Exception
     * or
     * @return void
     */
    public static function set($sessionArr = [])
    {  
        if(count($sessionArr) == 0) {
            throw new \Exception("A sessão não pode ser criada. Parâmetros = 0"); die();
        }

        try {
            foreach($sessionArr as $key => $value) {
                $_SESSION[$key] = $value;
            }
        } catch(\Exception $e) {
            throw new \Exception("Erro na criação da sessão, formato do array inválido."); die();
        }
    }

    public static function setLifeTime(int $time)
    {
        $_SESSION['session_logout_time'] = $_SESSION['session_start_login'] + $time;
    }

    public static function checkLifeTime()
    {
        if(isset($_SESSION['session_logout_time']) && time() >= $_SESSION['session_logout_time'] && isset($_SESSION['session_logged'])) {
            self::kill();
            header("location: /login"); exit();
        }
    }

        /**
     * Kill all session values 
     * https://www.php.net/manual/pt_BR/function.session-destroy.php
     * 
     * @return void
     */
    public static function kill()
    {
        $_SESSION = [];
        if(ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();

        foreach($_SESSION as $key) {
            unset($_SESSION[$key]);
        }
    }

    public static function unset($session)
    {
        unset($_SESSION[$session]);
    }
}