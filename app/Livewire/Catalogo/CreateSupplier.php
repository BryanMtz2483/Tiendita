<?php

namespace App\Livewire\Catalogo;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class CreateSupplier extends Component
{
    use WithPagination;
    public $rfc;
    public $name;
    public $phone;
    public $email;
    public $manager_name;
    public $address;
    public $sCreate = false;
    public $buscar;
    public $sEdit = false, $idEditable;
    public $supplierEdit =[
        'rfc' => '',
        'name' => '',
        'phone' => '',
        'email' => '',
        'manager_name' => '',
        'address' => '',
    ];

    public function render()
    {
        $suppliers = Supplier::where('name','LIKE', "%{$this->buscar}%")->orWhere('email','LIKE', "%{$this->buscar}%")->paginate(5);
        return view('livewire.catalogo.create-supplier', ['suppliers' => $suppliers]);
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
        $this -> reset(['rfc', 'name','phone','email','manager_name','address','sCreate']);
    }
    public function edit($supplierID){
        $this->sEdit = true;
        $supplierEditable = Supplier::find($supplierID);
        $this->idEditable = $supplierEditable -> id;
        $this->supplierEdit['rfc'] = $supplierEditable -> rfc;
        $this->supplierEdit['name'] = $supplierEditable -> name;
        $this->supplierEdit['phone'] = $supplierEditable -> phone;
        $this->supplierEdit['email'] = $supplierEditable -> email;
        $this->supplierEdit['manager_name'] = $supplierEditable -> manager_name;
        $this->supplierEdit['address'] = $supplierEditable -> address;
    }
    public function update(){
        $supplier = Supplier::find($this->idEditable);
        $supplier->update([
            'rfc' =>  $this->supplierEdit['rfc'],
            'name' =>  $this->supplierEdit['name'],
            'phone' =>  $this->supplierEdit['phone'],
            'email' =>  $this->supplierEdit['email'],
            'manager_name' =>  $this->supplierEdit['manager_name'],
            'address' =>  $this->supplierEdit['address'],
        ]);
        $this -> reset([
            'supplierEdit',
            'idEditable',
            'sEdit',
        ]);
    }
    public function delete(Supplier $supplier){
        $supplier -> delete();
    }
    public function updated($property_name){
        if ($property_name === 'buscar') {
            $this-> resetPage();
        }
    }
}
