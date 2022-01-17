<?php

namespace App\Classes;

class Session
{
    public static function setLifeTime(int $time)
    {
        $_SESSION['session_logout_time'] = $_SESSION['session_start_login'] + $time;
    }

    public static function checkLifeTime()
    {
        if(isset($_SESSION['session_logout_time']) && time() >= $_SESSION['session_logout_time'] && isset($_SESSION['session_logged'])) {
            \Afterimage\Session::kill();
            header("location: /login"); exit();
        }
    }
}