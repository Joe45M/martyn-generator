<div class="mb-3">

    @if(session()->has('success'))
        <div class="bg-green-200 p-5 rounded-md border border-green-300 text-green-950">
            {{ session('success') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="bg-red-200 p-5 rounded-md border border-red-300 text-red-950">
            {{ session('error') }}
        </div>
    @endif

</div>
