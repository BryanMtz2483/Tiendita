<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <x-button style="height: 40px; margin: 10px;" class="float-end" wire:click="set('pCreate','true')">Create Product</x-button>
        <x-input  style="margin: 10px; width:300px;" class="float-end" type="text" placeholder="Buscar..." wire:model.live='buscar' ></x-input>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NAME
                        </th>
                        <th scope="col" class="px-6 py-3">
                            STOCK
                        </th>
                        <th scope="col" class="px-6 py-3">
                            STORE PRICE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            PUBLIC PRICE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            EXPIRATION
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ASSORTMENT
                        </th>
                        <th scope="col" class="px-6 py-3">
                            STATUS
                        </th>
                        <th scope="col" class="px-6 py-3">
                            SUPPLIER
                        </th>
                        <th scope="col" class="px-6 py-3">
                            CATEGORY
                        </th>
                        <th scope="col" class="px-6 py-3">
                            CREATED AT
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ACTIONS
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$product -> id}}
                            </th>
                            <td class="px-6 py-4">
                                {{$product -> name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$product -> stock}}
                            </td>
                            <td class="px-6 py-4">
                                {{$product -> store_price}}
                            </td>
                            <td class="px-6 py-4">
                                {{$product -> public_price}}
                            </td>
                            <td class="px-6 py-4">
                                {{$product -> expiration}}
                            </td>
                            <td class="px-6 py-4">
                                {{$product -> assortment}}
                            </td>
                            <td class="px-6 py-4">
                                {{$product -> status}}
                            </td>
                            <td class="px-6 py-4">
                                {{$product -> supplier_id}}
                            </td>
                            <td class="px-6 py-4">
                                {{$product -> category_id}}
                            </td>
                            <td class="px-6 py-4">
                                {{$product -> created_at}}
                            </td>
                            <td class="flex space-x-2 justify-center">
                                <x-danger-button wire:click='delete({{$product -> id}})'>DELETE</x-danger-button>
                                <button class="inline-flex items-center px-4 py-2 bg-green-800 dark:bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-white active:bg-green-900 dark:active:bg-green-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 disabled:opacity-50 transition ease-in-out duration-150"  wire:click='edit({{$product -> id}})'>EDIT</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$products->links()}}
        </div>
                @if ($pCreate)
                <div class="bg-white-800 bg-opacity-25 fixed inset-0">
                    <div class="py-12">
                        <div class="bg-white shadow rounded-lg p-6">
                                    <form class="max-w-sm mx-auto" wire:submit='enviar'>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <x-label for="name" value="Name of Product."/>
                                                <x-input type="text" wire:model='name'/> 
                                            </div>
                                            <div>
                                                <x-label for="stock" value="Stock"/>
                                                <x-input type="text" wire:model='stock'/>
                                            </div>
                                            <div>
                                                <x-label for="store_price" value="Store Price"/>
                                                <x-input type="text" wire:model='store_price'/>
                                            </div>
                                            <div>
                                                <x-label for="public_price" value="Public Price"/>
                                                <x-input type="text" wire:model='public_price'/>
                                            </div>
                                            <div>
                                                <x-label for="expiration" value="Expiration"/>
                                                <x-input type="date" wire:model='expiration'/>
                                            </div>
                                            <div>
                                                <x-label for="assortment" value="Assortment"/>
                                                <x-input type="date" wire:model='assortment'/>
                                            </div>
                                            <div>
                                                <x-label for="status" value="Status"/>
                                                <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" wire:model='status'>
                                                    <option value="">Select a Status</option>
                                                    <option value="active">active</option>
                                                    <option value="disabled">disabled</option>
                                                </select>
                                            </div>
                                            <div>
                                                <x-label for="supplier" value="Supplier"/>
                                                <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" wire:model='supplier_id'>
                                                    <option value="">Select a Supplier</option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option wire:key='{{$supplier->id}}' value="{{$supplier->id}}">{{$supplier->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <x-label for="name" value="Category"/>
                                                <select name="" id="" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" wire:model='category_id'>
                                                    <option value="">Select a Category</option>
                                                    @foreach ($categories as $category)
                                                        <option wire:key='{{$category->id}}' value="{{$category->id}}">{{$category->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <x-danger-button class="mt-2" wire:click="set('pCreate', false)">Cancelar</x-danger-button>
                                        <x-button>Submit</x-button>
                                    </form>
                        </div>
                    </div>
                </div>
                @endif
                @if ($pEdit)
                <div class="bg-white-800 bg-opacity-25 fixed inset-0">
                    <div class="py-12">
                        <div class="bg-white shadow rounded-lg p-6">
                                    <form class="max-w-sm mx-auto" wire:submit='update'>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <x-label for="name" value="Name of Product."/>
                                                <x-input type="text" wire:model='productEdit.name'/> 
                                            </div>
                                            <div>
                                                <x-label for="stock" value="Stock"/>
                                                <x-input type="text" wire:model='productEdit.stock'/>
                                            </div>
                                            <div>
                                                <x-label for="store_price" value="Store Price"/>
                                                <x-input type="text" wire:model='productEdit.store_price'/>
                                            </div>
                                            <div>
                                                <x-label for="public_price" value="Public Price"/>
                                                <x-input type="text" wire:model='productEdit.public_price'/>
                                            </div>
                                            <div>
                                                <x-label for="expiration" value="Expiration"/>
                                                <x-input type="date" wire:model='productEdit.expiration'/>
                                            </div>
                                            <div>
                                                <x-label for="assortment" value="Assortment"/>
                                                <x-input type="date" wire:model='productEdit.assortment'/>
                                            </div>
                                            <div>
                                                <x-label for="status" value="Status"/>
                                                <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" wire:model='productEdit.status'>
                                                    <option value="">Select a Status</option>
                                                    <option value="active">active</option>
                                                    <option value="disabled">disabled</option>
                                                </select>
                                            </div>
                                            <div>
                                                <x-label for="supplier" value="Supplier"/>
                                                <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" wire:model='productEdit.supplier_id'>
                                                    <option value="">Select a Supplier</option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option wire:key='{{$supplier->id}}' value="{{$supplier->id}}">{{$supplier->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <x-label for="name" value="Category"/>
                                                <select name="" id="" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" wire:model='productEdit.category_id'>
                                                    <option value="">Select a Category</option>
                                                    @foreach ($categories as $category)
                                                        <option wire:key='{{$category->id}}' value="{{$category->id}}">{{$category->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <x-danger-button class="mt-2" wire:click="set('pEdit', false)">Cancelar</x-danger-button>
                                        <button class="inline-flex items-center px-4 py-2 bg-green-800 dark:bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-white active:bg-green-900 dark:active:bg-green-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 disabled:opacity-50 transition ease-in-out duration-150">Update</button>
                                    </form>
                        </div>
                    </div>
                </div>
                @endif
    </div>
</div>
