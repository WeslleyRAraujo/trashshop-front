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
        
        $result = $product->detail(Http::getResponseData()['prod'] ?? 0);

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
}