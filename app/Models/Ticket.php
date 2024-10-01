<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

     //protected $fillable = ['name'];
     protected $guarded =[]; //SE PODRÁ INSERTAR CUALQUIER DATO SIN NECESIDAD DE UN TOKEN
    
    public function products (){
        return $this->belongsToMany(Product::class);//MUCHOS A MUCHOS
    }

    public function invoice (){
        return $this->hasOne(Invoice::class);//UNO A UNO
    }
    public function clients (){
        return $this->belongsTo(Client::class);//UNO A MUCHOS INVERSA
    }
    public function branch (){
        return $this->belongsTo(Branch::class);//uno A MUCHOS INVERSA
    }
    public function user(){
        return $this->belongsTo(User::class);//UNO A MUCHOS INVERSA
    }
}
