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

    public function detail()
    {
        if(!isset($_SESSION['session_logged'])) {
            header('location: /login'); exit();
        }
        
        $product = new Product();
        
        $result = $product->detail(@$_GET['prod'] ? $_GET['prod'] : 0);

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