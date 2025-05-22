<div>
    <div class="relative border border-gray-300 rounded-xl">
        <div class="bg-gray-100 rounded-t-xl p-3 text-gray-600 text-sm">
            {{ $title ?? '' }}
        </div>
        <div class="bg-white p-3 relative">
            {{ $slot }}
        </div>
    </div>
</div>
