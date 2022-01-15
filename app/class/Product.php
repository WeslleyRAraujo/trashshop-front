<?php

namespace App\Classes;
use App\Classes\Database;
use Afterimage\Http;

class Product
{   
    const ALL_PRODUCTS = 'https://trash.gigalixirapp.com/api/v1/product';
    
    public function listAll()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, self::ALL_PRODUCTS);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJUcmFzaFNob3BJZCIsImV4cCI6MTY0NDY5MzE4NywiaWF0IjoxNjQyMjczOTg3LCJpc3MiOiJUcmFzaFNob3BJZCIsImp0aSI6IjFkOGMxZTBkLTQ0YWYtNDBlNi1iY2JlLWQ1MmM4ZjUzODY2OCIsIm5iZiI6MTY0MjI3Mzk4Niwic3ViIjozLCJ0eXAiOiJhY2Nlc3MifQ.PKFDw0GSWpsVfWEhNxkMuc2TZHBwHLg_q2SX3E7dyTNDlNAnitS8AOwkcxx_aNpIxJpojD83ehhACJVcRYaQNQ']);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        curl_close($curl);

        $result = json_decode($response, true);
        return $result['products'];
    }

    public function detail($code)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, self::ALL_PRODUCTS . "/" . $code);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $_SESSION['session_token']]);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        curl_close($curl);

        $result = json_decode($response, true);
        
        return $result;

        if(count($result) > 0) {
            return $result;
        } else {
            return false;
        }
    }
}

