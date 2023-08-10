<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Frais de scolarité pour chaque niveau') }}
        </h2>
    </x-slot>

    <div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-while overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('scolarites.liste-frais')
            </div>
       </div>
    </div>
</x-app-layout>
