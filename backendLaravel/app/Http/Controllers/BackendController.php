<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Mcp\Response;

class BackendController extends Controller
{
    private  $names = [

        1 => ['name' => 'Mirella', 'age' => 21],
        2 => ['name' => 'Mike', 'age' => 30],
        3 => ['name' => 'Evelin', 'age' => 22]
    ];


    public function getAll()
    {
        return response()
            ->json($this->names);
    }

    public function get(int $id = 0)
    {
        if (isset($this->names[$id])) {

            return response()->json($this->names[$id]);
        }
        return response()->json(['error' => 'No existente'], Response::HTTP_NOT_FOUND);
    }

    public function create(Request $request)
    {
        $person = [
            "id" => count($this->names),
            "name" => $request->input("name"),
            "age" => $request->input("age"),
        ];

        $this->names[$person["id"]] = $person;


        return response()->json(
            [
                "message" => "Created",
                "person" => $person
            ], //Codigo 200 
            201
        );
    }


    public function update(Request $request, $id)
    {
        if (isset($this->names[$id])) {
            $this->names[$id]["name"] = $request->input("name");
            $this->names[$id]["age"] = $request->input("age");



            return response()->json([
                "message" => "Persona actualizada",
                "person" => $this->names[$id]
            ]);
        }

        return response()->json(['error' => 'Persona no existente'], 404);
    }
}
