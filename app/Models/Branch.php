<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

     //protected $fillable = ['name'];
     protected $guarded =[]; //SE PODRÁ INSERTAR CUALQUIER DATO SIN NECESIDAD DE UN TOKEN
     
    public function tickets (){
        return $this->hasMany(Ticket::class);//UNO A MUCHOS
    }
    public function products (){
        return $this->belongsToMany(Product::class);//MUCHOS A MUCHOS
    }
    public function suppliers (){
        return $this->belongsToMany(Supplier::class);//MUCHOS A MUCHOS
    }
    public function users (){
        return $this->hasMany(User::class);//UNO A MUCHOS
    }
}
