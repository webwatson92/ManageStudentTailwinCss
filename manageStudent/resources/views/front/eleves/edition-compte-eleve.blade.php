<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Modification du compte de l'élève") }}
        </h2>
    </x-slot>

    <div class="py-2 px-12">
        @livewire('eleves.editer-compte-eleve', ['eleve'=> $eleve])
    </div>
</x-app-layout>
