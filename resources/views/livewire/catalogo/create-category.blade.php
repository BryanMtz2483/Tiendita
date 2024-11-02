<div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <x-button style="height: 40px; margin: 10px;" class="float-end" wire:click="set('cCreate','true')">Create Category</x-button>
            <x-input  style="margin: 10px; width:300px;" class="float-end" type="text" placeholder="Buscar..." wire:model.live='buscar' ></x-input>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-b dark:border-white">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-b dark:border-white">        
                    <tr class="border-b dark:border-white">
                        <th scope="col" class="px-6 py-3 ">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NAME
                        </th>
                        <th scope="col" class="px-6 py-3">
                            DESCRIPTION
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
                    @foreach ($categories as $category)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-white" wire:key="{{ $category->id }}">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$category -> id}}
                            </th>
                            <td class="px-6 py-4">
                                {{$category -> name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$category -> description}}
                            </td>
                            <td class="px-6 py-4">
                                {{$category -> created_at}}
                            </td>
                            <td class="px-6 py-4 flex space-x-2 justify-center">
                                <x-danger-button wire:click='delete({{$category -> id}})'>DELETE</x-danger-button>
                                <button class="inline-flex items-center px-4 py-2 bg-green-800 dark:bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white-800 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-white active:bg-green-900 dark:active:bg-green-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 disabled:opacity-50 transition ease-in-out duration-150" wire:click='edit({{$category -> id}})'>EDIT</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$categories->links()}}
        </div>
            @if ($mEdit)
            <div class="bg-white-800 bg-opacity-25 fixed inset-0">
                <div class="py-12">
                    <div class="bg-white shadow rounded-lg p-6">
                        <form class="max-w-sm mx-auto" wire:submit='update'>
                            <div class="mb-4"><span class="block font-medium text-sm text-black-700 dark:text-black-300 ">EDIT A CATEGORY</span></div>
                            <x-label  for="name" value="Category Name."/>
                            <x-input  class="w-full " type="text" wire:model='categoryEdit.name'/> 
                            <br><br>
                            <x-label  for="name" value="Description of category."/>
                            <x-input  class="w-full " type="text" wire:model='categoryEdit.description'/>
                            <br><br>
                            <x-danger-button class="mt-2" wire:click="set('mEdit', false)">Cancelar</x-danger-button>
                            <x-button class="mt-2">Update</x-button>
                        </form>
                    </div>
                </div>
            </div>   
            @endif
            @if ($cCreate)
            <div class="bg-white-800 bg-opacity-25 fixed inset-0">
                <div class="py-12">
                    <div class="bg-white shadow rounded-lg p-6">
                                <form class="max-w-sm mx-auto" wire:submit='enviar'>
                                <div><span class="block font-medium text-sm text-black-700 dark:text-black-300 ">CREATE A NEW CATEGORY</span></div>
                                <br>
                                <x-label for="name" value="Name of category."/>
                                <x-input type="text" wire:model='name'/> 
                                <br><br>
                                <x-label for="name" value="Description of category."/>
                                <x-input type="text" wire:model='description'/>
                                <br><br>
                                <x-danger-button class="mt-2" wire:click="set('cCreate', false)">Cancelar</x-danger-button>
                                <x-button>Submit</x-button>
                            </form> 
                    </div>
                </div>
            </div>
            @endif
</div>
{{-- NO PUEDES HACER DOS DIV MAESTROS, LA FUNCIÓN RENDER NO FUNCIONA PARA DOS ELEMENTOS MAESTROS, EN ESTE CASO DIV ES EL ELEMENTO MAESTRO, CON WIRE MODEL LIGAMOS LA INFO CON UNA VARIABLE Y CON WIRE CLICK ENVIAMOS LA INFORMACION A UNA VARIABLE --}}