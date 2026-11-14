<?php

namespace App\Http\Controllers;

use App\Business\Interfaces\MessageServiceInterface;
use App\Business\Services\HiService;
use App\Business\Services\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;


class InfoController extends Controller
{
    public function __construct(protected ProductService $productService){

    }
    //inyecta en automatico la clase y puedes usar sus métodos
    public function message(MessageServiceInterface $hiService){
        return response()->json($hiService->hi(), 200);
    }


    public function iva(int $id){
        //usando eloquent
        $product=Product::find($id);
        
        if(!$product){
            return response()->json(["message"=>"Producto no encontrado"], 404);
        }

        $priceIva=$this->productService->calculateIva($product->price);
        

        return response()->json([
            'price'=>$product->price,
            'priceWithIva'=>$priceIva
        ]);



    }
}
