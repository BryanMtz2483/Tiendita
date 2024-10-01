<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

     //protected $fillable = ['name'];
     protected $guarded =[]; //SE PODRÁ INSERTAR CUALQUIER DATO SIN NECESIDAD DE UN TOKEN
    
    //RELACION UNO A MUCHOS INVERSA
    public function category(){
        return $this->belongsTo(Category::class);
    }
    //RELACION UNO A MUCHOS INVERSA
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    //RELACION DE MUCHOS A MUCHOS
    public function tickets (){
        return $this->belongsToMany(Ticket::class);//MUCHOS A MUCHOS
    }
    public function branches (){
        return $this->belongsToMany(Branch::class);//MUCHOS A MUCHOS
    }
}
