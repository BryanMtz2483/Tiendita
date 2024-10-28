<?php

namespace App\Livewire\Catalogo;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CreateCategory extends Component
{
    use WithPagination;
    public $name;
    public $description;
    public $cCreate = false;
    public $idEditable;
    public $mEdit = false;
    public $categoryEdit =[
        'id' => '',
        'name' => '',
        'description' => '',
    ];
    public $buscar;
    public function mount (){
       /* $this -> name = $categories->name;
        $this -> description = $categories->description;
        //dd($cat); //SIRVE PARA DEBUGEAR LA INFORMACIÓN DE LA VARIABLE PERO NO GUARDA LA INFORMACIÓN, FUNCIONA COMO EL CONSOLE LOG DE JS*/
        //$this -> categories = Category::all();

    }//EJECUTA ALGUNAS COSAS ANTES DE RENDERIZAR
    
    public function render()
    {
        $categories = Category::where('name','LIKE', "%{$this->buscar}%")->orWhere('description','LIKE', "%{$this->buscar}%")->paginate(5);
        return view('livewire.catalogo.create-category', ['categories' => $categories]);
    }//RENDERIZA LA VISTA COMPLETA PARA PODER REDIBUJAR LOS COMPONENTES DE LA PÁGINA
    public function enviar(){
       /* $cat = Category::find($this->title);
        $this -> name = $cat->name;
        $this -> description = $cat->description;*/
        $category = new Category();
        $category->name = $this->name;
        $category->description = $this->description;
        $category->save();
        $this -> reset(['name', 'description','cCreate']);
    }
    public function edit($categoryID){
        $this->mEdit = true;
        $categoryEditable = Category::find($categoryID);
        $this->idEditable = $categoryEditable -> id;
        $this->categoryEdit['name'] = $categoryEditable -> name;
        $this->categoryEdit['description'] = $categoryEditable -> description;
    }
    public function update(){
        $category = Category::find($this->idEditable);
        $category->update([
            'name' =>  $this->categoryEdit['name'],
            'description' =>  $this->categoryEdit['description']
        ]);
        $this -> reset([
            'categoryEdit',
            'idEditable',
            'mEdit',
        ]);
    }
    public function delete(Category $category){
        $category -> delete();
    }
    public function updated($property_name){
        if ($property_name === 'buscar') {
            $this-> resetPage();
        }
    }
}
