<?php
/**
 * Controlador exemplo da rota /
 * 
 * @author Weslley Araujo (WeslleyRAraujo)
 */
namespace App\Controller;

use App\Database;
use App\Classes\Product;
use App\Classes\TrashShopAPI;
use Afterimage\Http;
use Afterimage\Session;

class ShopController
{
    public function index()
    {
        $product = new Product();
        $products = $product->listAll();

        if(!isset($_SESSION['session_logged'])) {
            header('location: /login'); exit();
        }

        return view('home', [
            'title' => 'Produtos',
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
        $res = new \App\Classes\TrashShopAPI();

        $res->login("carl@outlook.com", "123213");
    }
}