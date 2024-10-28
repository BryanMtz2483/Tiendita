<div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-3/3">
            <x-button style="height: 40px; margin: 10px;" class="float-end" wire:click="set('bCreate','true')">Create Branch</x-button>
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
                            PHONE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ADDRESS
                        </th>
                        <th scope="col" class="px-6 py-3">
                            RFC
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
                    @foreach ($branches as $branch)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$branch -> id}}
                            </th>
                            <td class="px-6 py-4">
                                {{$branch -> name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$branch -> phone}}
                            </td>
                            <td class="px-6 py-4">
                                {{$branch -> address}}
                            </td>
                            <td class="px-6 py-4">
                                {{$branch -> rfc}}
                            </td>
                            <td class="px-6 py-4">
                                {{$branch -> created_at}}
                            </td>
                            <td class="flex space-x-2 justify-center">
                                <x-danger-button wire:click='delete({{$branch -> id}})'>DELETE</x-danger-button>
                                <x-button class="inline-flex items-center px-4 py-2 bg-green-800 dark:bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-white active:bg-green-900 dark:active:bg-green-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 disabled:opacity-50 transition ease-in-out duration-150" wire:click='edit({{$branch -> id}})'>EDIT</x-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$branches->links()}}
        </div>
        @if ($bEdit)
            <div class="bg-white-800 bg-opacity-25 fixed inset-0">
                <div class="py-12">
                    <div class="bg-white shadow rounded-lg p-6">
                        <form class="max-w-sm mx-auto" wire:submit='update'>
                            <div class="mb-4"><span class="block font-medium text-sm text-black-700 dark:text-black-300 ">EDIT A BRANCH</span></div>                       
                            <x-label  for="name" value="Branch Name"/>
                            <x-input  class="w-full " type="text" wire:model='branchEdit.name'/>
                            <br><br>
                            <x-label  for="name" value="Branch Phone"/>
                            <x-input  class="w-full " type="text" wire:model='branchEdit.phone'/>
                            <br><br>
                            <x-label  for="name" value="Branch Address"/>
                            <x-input  class="w-full " type="text" wire:model='branchEdit.address'/>
                            <br><br>
                            <x-label  for="name" value="Branch RFC"/>
                            <x-input  class="w-full " type="text" wire:model='branchEdit.rfc'/> 
                            <br><br>
                            <x-danger-button class="mt-2" wire:click="set('bEdit', false)">Cancelar</x-danger-button>
                            <button class="inline-flex items-center px-4 py-2 bg-green-800 dark:bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-white active:bg-green-900 dark:active:bg-green-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 disabled:opacity-50 transition ease-in-out duration-150">Update</button>
                        </form>
                    </div>
                </div>
            </div>   
            @endif
        @if ($bCreate)
        <div class="bg-white-800 bg-opacity-25 fixed inset-0">
            <div class="py-12">
                <div class="bg-white shadow rounded-lg p-6">
                    <form class="max-w-sm mx-auto" wire:submit='enviar'>
                        <div><span class="block font-medium text-sm text-gray-700 dark:text-gray-300 ">CREATE A NEW BRANCH</span></div>
                        <br>
                        <x-label for="name" value="Branch Name."/>
                        <x-input type="text" wire:model='name'/> 
                        <br><br>
                        <x-label for="phone" value="Branch Phone."/>
                        <x-input type="text" wire:model='phone'/> 
                        <br><br>
                        <x-label for="address" value="Branch Address"/>
                        <x-input type="text" wire:model='address'/> 
                        <br><br>
                        <x-label for="rfc" value="Branch RFC"/>
                        <x-input type="text" wire:model='rfc'/> 
                        <br><br>
                        <x-danger-button class="mt-2" wire:click="set('bCreate', false)">Cancelar</x-danger-button>
                        <x-button>Guardar</x-button>
                    </form>
                </div>
            </div>
        </div>
        @endif
</div>
{{-- NO PUEDES HACER DOS DIV MAESTROS, LA FUNCIÓN RENDER NO FUNCIONA PARA DOS ELEMENTOS MAESTROS, EN ESTE CASO DIV ES EL ELEMENTO MAESTRO, CON WIRE MODEL LIGAMOS LA INFO CON UNA VARIABLE Y CON WIRE CLICK ENVIAMOS LA INFORMACION A UNA VARIABLE --}}
