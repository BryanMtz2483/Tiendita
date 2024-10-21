<div>
    <div><span class="block font-medium text-sm text-gray-700 dark:text-gray-300 ">CREATE A NEW CATEGORY</span></div>
    <br>
    <div>
        <form class="max-w-sm mx-auto" wire:submit='enviar'>
            <x-label for="name" value="Name of category."/>
            <x-input type="text" wire:model='name'/> 
            <br><br>
            <x-label for="name" value="Description of category."/>
            <x-input type="text" wire:model='description'/>
            <br><br>
            <x-button>Submit</x-button>
        </form>
    </div> 
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700" wire:key="{{ $category->id }}">
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
                            <td class="px-6 py-4">
                                <x-danger-button wire:click='delete({{$category -> id}})'>DELETE</x-danger-button>
                                <x-button class="bg-green-600" wire:click='edit({{$category -> id}})'>EDIT</x-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
{{-- NO PUEDES HACER DOS DIV MAESTROS, LA FUNCIÓN RENDER NO FUNCIONA PARA DOS ELEMENTOS MAESTROS, EN ESTE CASO DIV ES EL ELEMENTO MAESTRO, CON WIRE MODEL LIGAMOS LA INFO CON UNA VARIABLE Y CON WIRE CLICK ENVIAMOS LA INFORMACION A UNA VARIABLE --}}