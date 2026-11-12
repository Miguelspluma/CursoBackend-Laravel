<?php 
namespace App\Business\Services;

use App\Business\Entities\Taxes;

class ProductService{
    public function calculateIva($price){
        //1.16 por ejemplo 20x1.16 da 23.2
        return $price * (1 + Taxes::IVA);
    }
}

?>