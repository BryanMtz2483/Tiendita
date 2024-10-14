<?php

namespace App\Livewire\Catalogo;

use App\Models\Category;
use Livewire\Component;

class CreateCategory extends Component
{
    public $cat;
    public $name;
    public $description;
    public $title;
    public function mount (Category $cat){
        $this -> name = $cat->name;
        $this -> description = $cat->description;
        //dd($cat); //SIRVE PARA DEBUGEAR LA INFORMACIÓN DE LA VARIABLE PERO NO GUARDA LA INFORMACIÓN, FUNCIONA COMO EL CONSOLE LOG DE JS

    }//EJECUTA ALGUNAS COSAS ANTES DE RENDERIZAR
    public function render()
    {
        return view('livewire.catalogo.create-category');
    }//RENDERIZA LA VISTA COMPLETA PARA PODER REDIBUJAR LOS COMPONENTES DE LA PÁGINA
    public function enviar(){
       /* $cat = Category::find($this->title);
        $this -> name = $cat->name;
        $this -> description = $cat->description;*/
        $category = new Category();
        $category->name = $this->name;
        $category->description = $this->description;
        $category->save();
    }
}
