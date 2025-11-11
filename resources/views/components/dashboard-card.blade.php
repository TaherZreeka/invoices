<div class="bg-white p-4 rounded shadow">
    <h3 class="text-gray-500 text-sm">{{ $title }}</h3>
    <p class="text-2xl font-bold">{{ $total }}</p>
    <p class="text-gray-400 text-sm">عدد الفواتير: {{ $count }}</p>
    <div class="flex items-center mt-2">
        <i class="{{ $icon }} text-xl mr-2"></i>
        <span class="text-green-500">{{ $percent }}%</span>
    </div>
</div>
