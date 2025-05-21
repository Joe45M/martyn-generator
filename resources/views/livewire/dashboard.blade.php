<div>
    @if(session()->has('success'))
        <div class="bg-green-200 p-5 rounded-md border border-green-300 text-green-950">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid lg:grid-cols-2">
        <livewire:assign-repo></livewire:assign-repo>
    </div>
</div>
