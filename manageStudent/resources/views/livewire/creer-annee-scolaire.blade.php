<div class="p-2 bg-white shadow-sm">
     <form action="" method="post" wire:submit.prevent="ajouterAnneeScollaire()">
        @csrf
        @method('post')
        @if(Session::get('error'))
            <div class="p-5">
                <div class="border-red-500 p-5 bg-red-100 animate-bounce">{{ Session::get('error') }}</div>
            </div>
        @endif
        <div class="p-5">
            <label for="">{{ __('Libelle de l\'année scolaire') }}</label>
            <input wire:model="libelle" type="text" class="block mt-1 
                             @error('libelle') border-red-500 bg-red-100 animate-bounce @enderror 
                             rounded-md w-full border-gray-300">
            @error('libelle')
                <div class="">* Le champ libelle est requis </div>
            @enderror
        </div>
        
        <div class="p-5 flex justify-between items-center">
            <button class="bg-red-600 px-3 py-3 rounded-sm text-white">Annuler</button>
            <button type="submit" class="bg-blue-400 p-3 rounded-sm text-white">Ajouter</button>
        </div>

     </form>
</div>