<?php

namespace App\Classes;

/**
 * 
 * User infos manipulating class
 * 
 */
class User
{
    const LOGIN = 'https://trash.gigalixirapp.com/api/v1/login';

    public static function login($email, $password)
    {
        $curl = curl_init(self::LOGIN);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode([
            'email' => $email,
            'password' => $password
        ]));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response, true);
    }
}