<div wire:init="init" x-data="{show: true}" class="relative border border-gray-300 rounded-xl">
    <div class="bg-gray-100 rounded-t-xl p-3 text-gray-600 text-sm">
        Assign a repository
    </div>
    <div class="bg-white p-3 relative">
        @if(!$hasToken)
            <div class="text-gray-800 rounded-b-xl text-sm flex justify-between items-center">
                Authenticate with GitHub to assign a repository for this theme
                <a href="{{ route('socialite.github') }}" class="bg-green-200 border border-green-400 text-green-800 px-3 py-2 rounded-md">Link Github</a>
            </div>
        @else
            <x-text-input @keyup="show = true" wire:model="query" wire:keydown="search" class="w-full" placeholder="Search repositories"></x-text-input>
        @endif

        @if($searchResults)
            <div x-show="show" @click.outside="show = false" class="absolute max-h-64 overflow-y-auto z-20 top-[75%] left-3 bg-white z-10 rounded-md shadow-lg w-full overflow-hidden border border-gray-300">
                <div class="bg-gray-100 p-3 text-sm">Search results</div>
                @foreach($searchResults as $result)
                    <button @click="show = false" wire:click="setRepo('{{ $result['name'] }}')" class="p-3 text-left block w-full hover:bg-gray-100 border-b border-b-gray-300">
                        {{ $result['name'] }}
                    </button>
                @endforeach
            </div>
        @endif
    </div>
</div>
