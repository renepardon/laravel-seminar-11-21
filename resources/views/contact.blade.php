<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kontaktformular') }}
        </h2>
    </x-slot>

    <x-jet-authentication-card>
        <x-slot name="logo">
            &nbsp;
        </x-slot>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <livewire:contact></livewire:contact>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
