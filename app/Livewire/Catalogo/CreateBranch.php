<?php

namespace App\Livewire\Catalogo;

use App\Models\Branch;
use Livewire\Component;
use Livewire\WithPagination;

class CreateBranch extends Component
{
    use WithPagination;
    public $name;
    public $phone;
    public $address;
    public $rfc;
    public $bCreate = false;
    public $buscar;
    public $bEdit = false, $idEditable;
    public $branchEdit =[
        'name' => '',
        'phone' => '',
        'address' => '',
        'rfc' => '',
    ];

    public function render()
    {
        $branches = Branch::where('name','LIKE', "%{$this->buscar}%")->orWhere('address','LIKE', "%{$this->buscar}%")->paginate(5);
        return view('livewire.catalogo.create-branch', ['branches' => $branches]);
    }
    public function enviar(){
        $branches = new Branch();
        
        $branches->name = $this->name;
        $branches->phone = $this->phone;
        $branches->address = $this->address;
        $branches->rfc = $this->rfc;
        $branches->save();
        $this -> reset(['name','phone','address','rfc','bCreate']);
    }
    public function edit($branchId){
        $this->bEdit = true;
        $branchEditable = Branch::find($branchId);
        $this->idEditable = $branchEditable -> id;
        $this->branchEdit['name'] = $branchEditable -> name;
        $this->branchEdit['phone'] = $branchEditable -> phone;
        $this->branchEdit['address'] = $branchEditable -> address;
        $this->branchEdit['rfc'] = $branchEditable -> rfc;
    }
    public function update(){
        $supplier = Branch::find($this->idEditable);
        $supplier->update([
            'name' =>  $this->branchEdit['name'],
            'phone' =>  $this->branchEdit['phone'],
            'address' =>  $this->branchEdit['address'],
            'rfc' =>  $this->branchEdit['rfc'],
        ]);
        $this -> reset([
            'branchEdit',
            'idEditable',
            'bEdit',
        ]);
    }
    public function delete(Branch $branch){
        $branch -> delete();
    }
    public function updated($property_name){
        if ($property_name === 'buscar') {
            $this-> resetPage();
        }
    }
}
