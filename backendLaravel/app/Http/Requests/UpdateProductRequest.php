<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * ponlo true para que se pueda usar este request
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //Mis reglas de validación
            
            "name" => "required|string|max:255",
            "description" => "required|max:10000",
            "price" => "required|numeric",
            "category_id" => "required|exists:category,id"
        ];
    }

    //mensajes personalizados
    public function messages(){
        return [
            "name.required"=>"Es obligatorio master"
        ];
    }
}
