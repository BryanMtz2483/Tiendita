<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

     //protected $fillable = ['name'];
     protected $guarded =[]; //SE PODRÁ INSERTAR CUALQUIER DATO SIN NECESIDAD DE UN TOKEN
     
    public function ticket (){
        return $this->belongsTo(Ticket::class);//UNO A UNO, BELONGS ES A QUIEN PERTENECE.
    }
}
