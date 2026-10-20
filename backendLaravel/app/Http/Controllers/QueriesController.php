<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class QueriesController extends Controller
{
    //
    public function get()
    {
        $products = Product::all();
        return response()->json($products, 200);
    }

    public function getById(int $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Error, producto no encontrado'], 404);
        }

        //encontro el producto
        return response()->json(
            $product,
            200
        );
    }

    public function getNames()
    {
        $products = Product::select('name')
            ->orderBy("name", "desc")
            ->get(); //ejecuta consulta

        return response()->json($products);
    }

    public function searchNames(string $name, int $price)
    {
        $products = Product::where("name", $name)
            ->where("price", ">", $price)
            ->orderBy("name")
            ->select("name", "description")
            ->get();

        return response()->json($products);
    }

    public function searchString(string $value)
    {
        $products = Product::where("description", "like", "%$value%")
            ->get();



        return response()->json($products);
    }

    public function advanceSearch(Request $request)
    {
        $products = Product::where(
            function ($query) use ($request) {
                if ($request->input("name")) {
                    $query->where("name", "Like", "%{$request->input("name")}%");
                }
            }
        )
            ->where(
                function ($query) use ($request) {
                    if ($request->input("description")) {
                        $query->where("description", "Like", "%{$request->input("description")}%");
                    }
                }
            )
            ->where(
                function ($query) use ($request) {
                    if ($request->input("price")) {
                        $query->where("price", "Like", "%{$request->input("price")}%");
                    }
                }
            );
    }
}
