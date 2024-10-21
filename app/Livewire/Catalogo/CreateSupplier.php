<?php

namespace App\Livewire\Catalogo;

use App\Models\Supplier;
use Livewire\Component;

class CreateSupplier extends Component
{
    public $suppliers;
    public $rfc;
    public $name;
    public $phone;
    public $email;
    public $manager_name;
    public $address;
    public function render()
    {
        $this -> suppliers = Supplier::all();
        return view('livewire.catalogo.create-supplier');
    }
    public function enviar(){
        $suppliers = new Supplier();
        $suppliers->rfc = $this->rfc;
        $suppliers->name = $this->name;
        $suppliers->phone = $this->phone;
        $suppliers->email = $this->email;
        $suppliers->manager_name = $this->manager_name;
        $suppliers->address = $this->address;
        $suppliers->save();
        $this -> reset(['rfc', 'name','phone','email','manager_name','address']);
    }
    public function delete(Supplier $supplier){
        $supplier -> delete();
    }
}
