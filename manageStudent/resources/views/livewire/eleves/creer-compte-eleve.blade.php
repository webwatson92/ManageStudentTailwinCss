<div class="p-2 bg-white shadow-sm">
    <form action="" method="post" wire:submit.prevent="ajouterEleve()">
       @csrf
       @method('post')
       @if(Session::get('error'))
           <div class="p-5">
               <div class="border-red-500 p-5 bg-red-100 animate-bounce">{{ Session::get('error') }}</div>
           </div>
       @endif
       <div class="p-5">
           <label for="">{{ __('Matricule') }}</label>
           <input wire:model="matricule" type="text" placeholder="Ex: 06042564G" class="block mt-1 
                            @error('matricule') border-red-600 bg-red-100 animate-bounce @enderror 
                            rounded-md w-full border-gray-300">
           @error('matricule')
               <div class="">* Le champ matricule est requis </div>
           @enderror
       </div>
       <div class="p-5">
            <label for="">{{ __('Nom') }}</label>
            <input wire:model="nom" type="text" class="block mt-1 
                            @error('nom') border-red-600 bg-red-100 animate-bounce @enderror 
                            rounded-md w-full border-gray-300">
            @error('nom')
                <div class="">* Le champ nom est requis </div>
            @enderror
        </div>
        <div class="p-5">
            <label for="">{{ __('Prenom') }}</label>
            <input wire:model="prenom" type="text" class="block mt-1 
                             @error('prenom') border-red-600 bg-red-100 animate-bounce @enderror 
                             rounded-md w-full border-gray-300">
            @error('prenom')
                <div class="">* Le champ prenom est requis </div>
            @enderror
        </div>
        <div class="p-5">
            <label for="">{{ __('Date de naissance') }}</label>
            <input wire:model="date_naissance" type="date" class="block mt-1 
                             @error('date_naissance') border-red-600 bg-red-100 animate-bounce @enderror 
                             rounded-md w-full border-gray-300">
            @error('date_naissance')
                <div class="">* Le champ date de naissance est requis </div>
            @enderror
        </div>
        <div class="p-5">
            <label for="">{{ __('Contact élève (facultatif)') }}</label>
            <input wire:model="contact_eleve" placeholder="(+225) xx xx xx xx xx" type="text" class="block mt-1 
                             @error('contact_eleve') border-red-600 bg-red-100 animate-bounce @enderror 
                             rounded-md w-full border-gray-300">
            @error('contact_eleve')
                <div class="">* Le champ contact est requis </div>
            @enderror
        </div>
        <div class="p-5">
            <label for="">{{ __("Nom d'un parent") }}</label>
            <input wire:model="nom_parent" type="text" class="block mt-1 
                             @error('nom_parent') border-red-600 bg-red-100 animate-bounce @enderror 
                             rounded-md w-full border-gray-300">
            @error('nom_parent')
                <div class="">* Le champ nom du parent est requis </div>
            @enderror
        </div>
        <div class="p-5">
            <label for="">{{ __("Contact d'un parent") }}</label>
            <input wire:model="contact_parent" type="text" placeholder="(+225) xx xx xx xx xx" class="block mt-1 
                             @error('contact_parent') border-red-600 bg-red-100 animate-bounce @enderror 
                             rounded-md w-full border-gray-300">
            @error('contact_parent')
                <div class="">* Le champ contact est requis </div>
            @enderror
        </div>
       <div class="p-5 flex justify-between items-center">
           <button class="bg-red-600 px-3 py-3 rounded-sm text-white">Annuler</button>
           <button type="submit" class="bg-blue-400 p-3 rounded-sm text-white">{{ __("Inscrire l'élève maintenant") }}</button>
       </div>
    </form>
</div>