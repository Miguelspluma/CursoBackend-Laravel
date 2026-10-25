<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table='product';

    //permite mdificaciones en la bd
    protected $fillable=['name', 'description', 'price','category_id'];

    //oculta la informacion cuando se devuelve en los return 
    protected $hidden=[
        "created_at",
        "updated_at"
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
