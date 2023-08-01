<div class="p-2 bg-white shadow-sm">
    <form action="" method="post" wire:submit.prevent="ajouterEleveEnClasse()">
       @csrf
       @method('post')
       @if(Session::get('error'))
           <div class="p-5">
               <div class="border-red-500 p-5 bg-red-100 animate-bounce">{{ Session::get('error') }}</div>
           </div>
       @endif
       @if($error)
            <div class="p-5">
                <div class="block p-2 bg-red-700 text-white rounded-sm shadow-sm mt-2 animate-bounce 
                ">{{ $error }}</div>
            </div>
        @endif
       <div class="p-5">
            <label for="">{{ __('Matricule') }}</label>
            <input wire:model="matricule" type="text" class="block mt-1 
                            @error('matricule') border-red-600 bg-red-100 animate-bounce @enderror 
                            rounded-md w-full border-gray-300">
            @error('matricule')
                <div class="">* Le champ matricule est requis </div>
            @enderror
        </div>
        <div class="p-5">
            <label for="">{{ __('Nom Complet') }}</label>
            <input wire:model="nomComplet" type="text" readonly class="block mt-1 
                             @error('nomComplet') border-red-600 bg-red-100 animate-bounce @enderror 
                             rounded-md w-full border-gray-300">
        </div>
       <div class="p-5">
            <label for="">{{ __('Choix du niveau') }}</label>
            <select wire:model="niveau_id" class="block mt-1 
                @error('niveau_id') border-red-600 bg-red-100 animate-bounce @enderror 
                rounded-md w-full border-gray-300">
                <option></option>
                @foreach($niveauxDeLanneActive as $item)
                    <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                @endforeach
            </select>
            @error('niveau_id')
                <div class="">* Le champ niveau est requis </div>
            @enderror
        </div>

        <div class="p-5">
            <label for="">{{ __('Choix de la classe') }}</label>
            <select wire:model="classe_id" class="block mt-1 rounded-md w-full border-gray-300">
                <option></option>
                @foreach($listeClasse as $item)
                    <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                @endforeach
            </select>
            @error('classe_id')
                <div class="">* Le champ classe est requis </div>
            @enderror
        </div>
       
       <div class="p-5 flex justify-between items-center">
           <button class="bg-red-600 px-3 py-3 rounded-sm text-white">{{ __("Annuler") }}</button>
           <button type="submit" class="bg-blue-400 p-3 rounded-sm text-white">{{ __("Insrit l'élève à une classe") }}</button>
       </div>
    </form>
</div>