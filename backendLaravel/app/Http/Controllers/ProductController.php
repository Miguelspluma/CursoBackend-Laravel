<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    //

    public function index(Request $request)
    {
        $per_page = $request->query('per_page');
        $page = $request->query('page', 0);
        $offset = $page * $per_page;
        $products = Product::skip($offset)->take($per_page)->get();
        return response()->json($products);
    }


    public function store(Request $request)
    {
        $ValidatedData = $request->validate([
            "name" => "required|string|max:255",
            "description" => "required|max:10000",
            "price" => "required|numeric",
            "category_id" => "required|exists:category,id"
        ]);

        $product = Product::create($ValidatedData);
        return response()->json($product);
    }
}
