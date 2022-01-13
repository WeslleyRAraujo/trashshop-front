<?php
/**
 * Controlador exemplo da rota /
 * 
 * @author Weslley Araujo (WeslleyRAraujo)
 */
namespace App\Controller;

use App\Database;
use App\Classes\Product; 
use Afterimage\Http;

class ShopController
{
    public function index()
    {
        $product = new Product();
        $products = $product->listAll();

        return view('home', [
            'title' => 'Produtos',
            'css' => ['home.css'],
            'breadcrumb' => ['Trash Shop', 'Ínicio'],
            'products' => $products
        ]);
    }

    public function productDetail()
    {
        $product = new Product();
        
        $result = $product->detail(intval(@Http::getResponseData()['prod']) ? Http::getResponseData()['prod'] : 0);

        $notFound = false;

        if(!$result) {
            $notFound = true;
        }

        return view('shop', [
            'title' => 'Detalhes',
            'breadcrumb' => ['Trash Shop', 'Shop'],
            'notFound' => $notFound,
            'product' => $result
        ]);
    }

    public function test()
    {
        $cep = \App\Classes\ViaCEP::search('04104040');
        print_r(json_decode($cep, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }
}