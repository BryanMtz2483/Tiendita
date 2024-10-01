<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    //protected $fillable = ['name'];
    protected $guarded =[]; //SE PODRÁ INSERTAR CUALQUIER DATO SIN NECESIDAD DE UN TOKEN

    //RELACIÓN UNO A MUCHOS
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function branches (){
        return $this->belongsToMany(Branch::class);//MUCHOS A MUCHOS
    }
}
