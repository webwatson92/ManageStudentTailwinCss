<div class="p-2 bg-white shadow-sm">
    <form action="" method="post" wire:submit.prevent="inscriptionEleve()">
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
            <label for="">{{ __('Montant') }}</label>
            <input wire:model="montant" type="number" class="block mt-1 
                            @error('montant') border-red-600 bg-red-100 animate-bounce @enderror 
                            rounded-md w-full border-gray-300">
            @error('montant')
                <div class="">* Le champ montant est requis </div>
            @enderror
        </div>

       <div class="p-5 flex justify-between items-center">
           <button class="bg-red-600 px-3 py-3 rounded-sm text-white">{{ __("Annuler") }}</button>
           <button type="submit" class="bg-blue-400 p-3 rounded-sm text-white">{{ __("Faire le paiement") }}</button>
       </div>
    </form>
</div>