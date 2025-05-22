<x-card title="All registered users">
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
</x-card>
