<?php

namespace App\Http\Controllers;

use App\Business\Interfaces\MessageServiceInterface;
use App\Business\Services\EncryptorService;
use App\Business\Services\HiService;
use App\Business\Services\ProductService;
use App\Business\Services\SingletonService;
use App\Business\Services\UserService;
use App\Models\Product;
use Illuminate\Http\Request;


class InfoController extends Controller
{
    public function __construct(
        protected ProductService $productService,
        protected EncryptorService $encryptorService,
        protected UserService $userService,
        protected SingletonService $singletonService,
        protected MessageServiceInterface $hiService
    ) {

        //...
    }
    //inyecta en automatico la clase y puedes usar sus métodos
    public function message()
    {
        return response()->json($this->hiService->hi(), 200);
    }


    public function iva(int $id)
    {
        //usando eloquent
        $product = Product::find($id);

        if (!$product) {
            return response()->json(["message" => "Producto no encontrado"], 404);
        }

        $priceIva = $this->productService->calculateIva($product->price);


        return response()->json([
            'price' => $product->price,
            'priceWithIva' => $priceIva
        ]);
    }

    public function encrypt($data): string
    {
        return response()->json($this->encryptorService->encrypt($data));
    }
    public function decrypt($data): string
    {
        return response()->json($this->encryptorService->decrypt($data));
    }


    public function encryptEmail(int $id)
    {
        $emailEncryted = $this->userService->encryptEmail($id);
        return response()->json($emailEncryted);
    }

    public function singleton(SingletonService $singletonService2)
    {
        //ambos objetos deben ser iguales al crearse
        return response()->json($this->singletonService->value . " " . $singletonService2->value);
    }


    //tomando objetos manualmente del service container
    public function encryptEmail2(int $id){
         $emailEncryted = $this->userService->encryptEmail($id);
        return response()->json($emailEncryted);
    }
}
