<div class="p-2 bg-white shadow-sm">
    <form action="" method="post" wire:submit.prevent="modifierClasse()">
       @csrf
       @method('post')
       @if(Session::get('error'))
           <div class="p-5">
               <div class="border-red-500 p-5 bg-red-100 animate-bounce">{{ Session::get('error') }}</div>
           </div>
       @endif

       <div class="p-5">
            <label for="">{{ __('Libelle') }}</label>
            <input wire:model="libelle" type="text" class="block mt-1 
                            @error('libelle') border-red-600 bg-red-100 animate-bounce @enderror 
                            rounded-md w-full border-gray-300">
            @error('libelle')
                <div class="">* Le champ libelle est requis </div>
            @enderror
        </div>
       
        <div class="p-5">
            <label for="">{{ __('Choix du niveau scolaire') }}</label>
            <select wire:model="niveau_id" class="block mt-1 
                @error('scolarite') border-red-600 bg-red-100 animate-bounce @enderror 
                rounded-md w-full border-gray-300">
                <option></option>
                @foreach($niveaux as $item)
                     <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                @endforeach
            </select>
            @error('niveau_id')
                <div class="">* Le champ niveau est requis </div>
            @enderror
        </div>
       
       <div class="p-5 flex justify-between items-center">
           <button class="bg-red-600 px-3 py-3 rounded-sm text-white">Annuler</button>
           <button type="submit" class="bg-blue-400 p-3 rounded-sm text-white">Mettre à jour</button>
       </div>
    </form>
</div>