<?php

namespace App\Classes;

class TrashShop
{
    /**
     * API Consumer
     * 
     * @param string $env, var in .ini for request
     * @param array $request, request body
     * 
     * @return array
     */
    public static function request(string $env, array $request)
    {
        $curl = curl_init($_ENV[$env]);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($request));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response, true);
    }
}