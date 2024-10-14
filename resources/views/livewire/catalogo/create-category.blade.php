<div>
    <x-input type="text" wire:model='name'/> 
    <x-input type="text" wire:model='description'/>
    <x-button wire:click='enviar'>Submit</x-button> 
</div>
{{-- NO PUEDES HACER DOS DIV MAESTROS, LA FUNCIÓN RENDER NO FUNCIONA PARA DOS ELEMENTOS MAESTROS, EN ESTE CASO DIV ES EL ELEMENTO MAESTRO, CON WIRE MODEL LIGAMOS LA INFO CON UNA VARIABLE Y CON WIRE CLICK ENVIAMOS LA INFORMACION A UNA VARIABLE --}}