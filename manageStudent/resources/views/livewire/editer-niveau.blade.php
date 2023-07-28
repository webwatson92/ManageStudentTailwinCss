<div class="p-2 bg-white shadow-sm">
    <form action="" method="post" wire:submit.prevent="modifierNiveaux()">
       @csrf
       @method('post')
       @if(Session::get('error'))
           <div class="p-5">
               <div class="border-red-500 p-5 bg-red-100 animate-bounce">{{ Session::get('error') }}</div>
           </div>
       @endif
       <input type="hidden" wire:model="id">
       <div class="p-5">
           <label for="">{{ __('Code') }}</label>
           <input wire:model="code" type="text" class="block mt-1 
                            @error('code') border-red-600 bg-red-100 animate-bounce @enderror 
                            rounded-md w-full border-gray-300">
           @error('code')
               <div class="">* Le champ code est requis </div>
           @enderror
       </div>

       <div class="p-5">
            <label for="">{{ __('Libelle du niveau') }}</label>
            <input wire:model="libelle" type="text" class="block mt-1 
                            @error('libelle') border-red-600 bg-red-100 animate-bounce @enderror 
                            rounded-md w-full border-gray-300">
            @error('libelle')
                <div class="">* Le champ libelle du niveau est requis </div>
            @enderror
        </div>

        <div class="p-5">
            <label for="">{{ __('Montant de la scolarité') }}</label>
            <input wire:model="scolarite" type="text" class="block mt-1 
                            @error('scolarite') border-red-600 bg-red-100 animate-bounce @enderror 
                            rounded-md w-full border-gray-300">
            @error('scolarite')
                <div class="">* Le champ montant de la scolarité est requis </div>
            @enderror
        </div>
       
       <div class="p-5 flex justify-between items-center">
           <button class="bg-red-600 px-3 py-3 rounded-sm text-white">Annuler</button>
           <button type="submit" class="bg-blue-400 p-3 rounded-sm text-white">Mettre à jour</button>
       </div>
    </form>
</div>