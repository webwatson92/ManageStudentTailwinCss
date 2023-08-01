<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Modification  classe de l'élève et/ou du niveau") }}
        </h2>
    </x-slot>

    <div class="py-2 px-12">
        @livewire('attributions.modification-classe-eleve', ['attribution'=> $attribution])
    </div>
</x-app-layout>
