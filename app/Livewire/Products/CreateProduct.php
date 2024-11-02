<?php

namespace App\Livewire\Products;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class CreateProduct extends Component
{
    use WithPagination;
    public $pCreate = false;
    public $name,$stock,$store_price,$public_price,$expiration,$assortment,$status,$supplier_id,$category_id;
    public $categories, $suppliers;
    public $buscar;
    public $pEdit = false, $idEditable;
    public $productEdit =[
        'name' => '',
        'stock' => '',
        'store_price' => '',
        'public_price' => '',
        'expiration' => '',
        'assortment' => '',
        'status' => '',
        'supplier_id' => '',
        'category_id' => '',
    ];
    public function mount(){
        $this->categories = Category::all();
        $this->suppliers = Supplier::all();
    }
    public function render()
    {
        $products = Product::where('name','LIKE', "%{$this->buscar}%")->orWhere('category_id','LIKE', "%{$this->buscar}%")->paginate(5);
        return view('livewire.products.create-product', ['products' => $products]);
    }
    public function enviar() {
        $products = new Product();
        $products->name = $this->name;
        $products->stock = $this->stock;
        $products->store_price = $this->store_price;
        $products->public_price = $this->public_price;
        $products->expiration = $this->expiration;
        $products->assortment = $this->assortment;
        $products->status = $this->status;
        $products->supplier_id = $this->supplier_id;
        $products->category_id = $this->category_id;
        $products->save();
        $this -> reset(['name','stock','store_price','public_price','expiration','assortment','status','supplier_id','category_id','pCreate']);
    }

    public function edit($productID){
        $this->pEdit = true;
        $productEditable = Product::find($productID);
        $this->idEditable = $productEditable -> id;
        $this->productEdit['name'] = $productEditable -> name;
        $this->productEdit['stock'] = $productEditable -> stock;
        $this->productEdit['store_price'] = $productEditable -> store_price;
        $this->productEdit['public_price'] = $productEditable -> public_price;
        $this->productEdit['expiration'] = $productEditable -> expiration;
        $this->productEdit['assortment'] = $productEditable -> assortment;
        $this->productEdit['status'] = $productEditable -> status;
        $this->productEdit['supplier_id'] = $productEditable -> supplier_id;
        $this->productEdit['category_id'] = $productEditable -> category_id;
    }
    public function update(){
        $product = Product::find($this->idEditable);
        $product->update([
            'name' =>  $this->productEdit['name'],
            'stock' =>  $this->productEdit['stock'],
            'store_price' =>  $this->productEdit['store_price'],
            'public_price' =>  $this->productEdit['public_price'],
            'expiration' =>  $this->productEdit['expiration'],
            'assortment' =>  $this->productEdit['assortment'],
            'status' =>  $this->productEdit['status'],
            'supplier_id' =>  $this->productEdit['supplier_id'],
            'category_id' =>  $this->productEdit['category_id'],
        ]);
        $this -> reset([
            'productEdit',
            'idEditable',
            'pEdit',
        ]);
    }

    public function delete(Product $product){
        $product -> delete();
    }
    public function updated($property_name){
        if ($property_name === 'buscar') {
            $this-> resetPage();
        }
    }
}
