<?php

namespace App\Classes;
use App\Classes\Database;
use Afterimage\Http;

class Product
{   
    private $table = 'product';
    
    public function listAll()
    {
        $sql = "select * from {$this->table}";
        
        return (new Database())->execQuery($sql);
    }

    public function detail($id)
    {
        $productId = $id;

        $sql = "select * from {$this->table} where idproduct = :id";

        $conn = new Database();

        $result = $conn->execQuery($sql, [
            'id' => $productId
        ]);

        if(count($result) > 0) {
            return $result;
        } else {
            return false;
        }
    }
}

