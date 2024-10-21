<div>
    <div><span class="block font-medium text-sm text-gray-700 dark:text-gray-300 ">CREATE A NEW SUPPLIER</span></div>
    <br>
    <div>
        <form wire:submit='enviar'>
            <x-label for="rfc" value="Supplier´s RFC."/>
            <x-input type="text" wire:model='rfc'/> 
            <br><br>
            <x-label for="name" value="Supplier Name."/>
            <x-input type="text" wire:model='name'/> 
            <br><br>
            <x-label for="phone" value="Supplier´s Phone."/>
            <x-input type="text" wire:model='phone'/> 
            <br><br>
            <x-label for="email" value="Supplier´s Email"/>
            <x-input type="text" wire:model='email'/> 
            <br><br>
            <x-label for="manager_name" value="Name of the Supplier's manager."/>
            <x-input type="text" wire:model='manager_name'/> 
            <br><br>
            <x-label for="address" value="Supplier's Address"/>
            <x-input type="text" wire:model='address'/> 
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
                            RFC
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NAME
                        </th>
                        <th scope="col" class="px-6 py-3">
                            PHONE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            EMAIL
                        </th>
                        <th scope="col" class="px-6 py-3">
                            MANAGER NAME
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ADDRESS
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
                    @foreach ($suppliers as $supplier)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$supplier -> id}}
                            </th>
                            <td class="px-6 py-4">
                                {{$supplier -> rfc}}
                            </td>
                            <td class="px-6 py-4">
                                {{$supplier -> name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$supplier -> phone}}
                            </td>
                            <td class="px-6 py-4">
                                {{$supplier -> email}}
                            </td>
                            <td class="px-6 py-4">
                                {{$supplier -> manager_name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$supplier -> address}}
                            </td>
                            <td class="px-6 py-4">
                                {{$supplier -> created_at}}
                            </td>
                            <td class="px-6 py-4">
                                <x-danger-button wire:click='delete({{$supplier -> id}})'>DELETE</x-danger-button>
                                <x-button class="bg-green-600" wire:click='edit({{$supplier -> id}})'>EDIT</x-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
{{-- NO PUEDES HACER DOS DIV MAESTROS, LA FUNCIÓN RENDER NO FUNCIONA PARA DOS ELEMENTOS MAESTROS, EN ESTE CASO DIV ES EL ELEMENTO MAESTRO, CON WIRE MODEL LIGAMOS LA INFO CON UNA VARIABLE Y CON WIRE CLICK ENVIAMOS LA INFORMACION A UNA VARIABLE --}}