<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Modification du compte parent") }}
        </h2>
    </x-slot>

    <div class="py-2 px-12">
        @livewire('parents.editer-compte-parent', ['parent'=> $parent])
    </div>
</x-app-layout>
