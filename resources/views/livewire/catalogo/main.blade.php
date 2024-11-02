<div>
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
        <x-button wire:click="set('mView','Categories')">CATEGORIES</x-button> 
        <x-button wire:click="set('mView','Suppliers')">SUPPLIERS</x-button>  
        <x-button wire:click="set('mView','Branches')">BRANCHES</x-button>     
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                @if ($mView == 'Categories')
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative overflow-x-auto shadow-md sm:rounded-l border-cyan-500">
                            @livewire('catalogo.create-category');
                        </div>                
                @elseif($mView == 'Suppliers')
                <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 relative overflow-x-auto shadow-md sm:rounded-l border-cyan-500">
                    @livewire('catalogo.create-supplier');
                </div> 
                @elseif($mView == 'Branches')
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative overflow-x-auto shadow-md sm:rounded-l border-cyan-500">
                    @livewire('catalogo.create-branch');
                </div> 
                @endif
                
            </div>
    </div>
</div>