<?php

namespace App\Classes;
use App\Classes\Database;

class Log
{
    public static function write($message)
    {
        $sql = "INSERT INTO log(message, datelog)
                VALUES(:message, current_timestamp)";
        
        
        (new Database())->execQuery($sql, ["message" => $message]);
    }
}