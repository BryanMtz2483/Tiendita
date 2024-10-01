<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

     //protected $fillable = ['name'];
     protected $guarded =[]; //SE PODRÁ INSERTAR CUALQUIER DATO SIN NECESIDAD DE UN TOKEN
     
    public function tickets (){
        return $this->hasMany(Ticket::class);//UNO A MUCHOS
    }
}
