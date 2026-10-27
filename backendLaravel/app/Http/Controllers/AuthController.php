<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    //
    public function register(UserRequest $request){
        $validateData= $request->validated();
        
        $user= User::create([
            "name"=>$validateData['name'],
            "email"=>$validateData['email'],
            "password"=>bcrypt($validateData['password']),
        ]);

        
    }


    public function login(LogginRequest $request){
        $validateData= $request->validated();

        $credentials=[
            "email"=>$validateData['email'],
            "password"=>$validateData['password'],
        ];

        //usando el token para autentificar
        try {
            $token=JWTAuth::attempt($credentials);
            if(!$token){
                return response()->json(["error"=>"Credenciales incorrectas"]);
            }
        } catch (JWTException) {
            return response()->json(["Error al generar el Token"], 500);
        }

        //llamando al otro method

        return $this->respondWithToken($token);
    }

    public function respondWithToken($token){
        return response(
            [
                "token"=>$token,
                "token_type"=>"Bearer",
                "expires_in"=>auth()->factory()->getTTL()
            ]
        );
    }

    public function who(){
        $user=auth()->user();
        return response()->json($user);
        
    }
}
