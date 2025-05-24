<x-card title="All registered users">

    <div class="flex gap-3">
        <div>
            <x-text-input wire:keyup="search" wire:model="name" placeholder="Name"></x-text-input>
        </div>
        <div>
            <x-text-input wire:keyup="search" wire:model="email" placeholder="Email"></x-text-input>
        </div>
    </div>

    @foreach($users as $user)
        <div class="flex justify-between items-center p-3 {{ $loop->last ?? 'border-b border-b-gray-300' }}">
            <div class="flex items-center">
                <img src="{{ $user->image }}" alt="{{ $user->name }}" class="w-10 h-10 rounded-full mr-3">
                <div>
                    <h2 class="text-lg font-semibold">{{ $user->name }}</h2>
                    <p class="text-sm text-gray-600">{{ $user->email }}</p>
                </div>
            </div>
        </div>
    @endforeach

    @if($users->isEmpty())
        <div class="p-5">
            <p class="text-gray-500">No users found.</p>
        </div>
    @endif
</x-card>
