<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Création d'un niveu scolaire") }}
        </h2>
    </x-slot>

    <div class="py-2 px-12">
        @livewire('creer-niveau-scolaire')
    </div>
</x-app-layout>
