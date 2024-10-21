<?php

namespace App\Livewire\Catalogo;

use App\Models\Branch;
use Livewire\Component;

class CreateBranch extends Component
{
    public $branches;
    public $name;
    public $phone;
    public $address;
    public $rfc;

    public function render()
    {
        $this -> branches = Branch::all();
        return view('livewire.catalogo.create-branch');
    }
    public function enviar(){
        $branches = new Branch();
        
        $branches->name = $this->name;
        $branches->phone = $this->phone;
        $branches->address = $this->address;
        $branches->rfc = $this->rfc;
        $branches->save();
        $this -> reset(['name','phone','address','rfc']);
    }
    public function delete(Branch $branch){
        $branch -> delete();
    }
}
