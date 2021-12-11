<?php
/**
 * Controlador exemplo da rota /
 * 
 * @author Weslley Araujo (WeslleyRAraujo)
 */
namespace App\Controller;

use Afterimage\Core\Http;

class HomeController
{
    /**
     * Retorna view home localizada em /app/views/home.twig
     * 
     * @return Twig::display
     */
    public function index()
    {
        return view('home', [
            'title' => 'Produtos',
            'breadcrumb' => ['Trash Shop', 'Ínicio']
        ]);
    }

    /**
     * Mostra um json
     */
    public function json()
    {
        print_r(Http::getResponseData());
    }
}