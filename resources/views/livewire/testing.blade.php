<div>
    <button
        wire:click="increment"
        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition"
    >
        increment
    </button>
    <h1>{{ $count }}</h1>
</div>
