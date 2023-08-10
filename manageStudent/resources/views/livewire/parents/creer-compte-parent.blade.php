<div class="p-2 bg-white shadow-sm">
    <form action="" method="post" wire:submit.prevent="ajouterParent()">
       @csrf
       @method('post')
       @if(Session::get('error'))
           <div class="p-5">
               <div class="border-red-500 p-5 bg-red-100 animate-bounce">{{ Session::get('error') }}</div>
           </div>
       @endif
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
            <label for="">{{ __('Email)') }}</label>
            <input wire:model="email" placeholder="exemple@exemple.com" type="email" class="block mt-1 
                             @error('email') border-red-600 bg-red-100 animate-bounce @enderror 
                             rounded-md w-full border-gray-300">
            @error('email')
                <div class="">* Le champ contact est requis </div>
            @enderror
        </div>
        <div class="p-5">
            <label for="">{{ __("Contact") }}</label>
            <input wire:model="contact" type="text" placeholder="(+225) xx xx xx xx xx" class="block mt-1 
                             @error('contact') border-red-600 bg-red-100 animate-bounce @enderror 
                             rounded-md w-full border-gray-300">
            @error('contact')
                <div class="">* Le champ contact est requis </div>
            @enderror
        </div>
       <div class="p-5 flex justify-between items-center">
           <button class="bg-red-600 px-3 py-3 rounded-sm text-white">Annuler</button>
           <button type="submit" class="bg-blue-400 p-3 rounded-sm text-white">{{ __("Créer le compte maintenant") }}</button>
       </div>
    </form>
</div>