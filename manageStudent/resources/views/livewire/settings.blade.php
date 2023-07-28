<div class="mt-5">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
        {{-- Titre et bouton crée--}}
        <div class="flex justify-between items-center">
            
            <input wire:model="search" type="text" class="block mt-1 border-gray-300 rounded-md">

            <a href="{{ route('create.anneescolaire') }}" class="bg-blue-500 rounded-md p-2 text-white">
                Nouvelle année scoalaire
            </a>
        </div>
        {{-- section message flash avec sweetAlert --}}
        @if(Session::get('success'))
            <div class="p-5">
                <div class="block p-2 bg-green-500 text-white rounded-sm shadow-sm mt-2"> {{ Session::get('success') }}</div>
            </div>
        @endif

       {{-- Stylisation du tableau --}}
       <div class="overflow-x-auto">
            <div class="py-4 inline-block min-w-full">
               <div class="overflow-hidden">
                    <table class="min-w-full text-center">
                        <thead class="border-b bg-gray-50">
                            <tr>
                                <th class="text-sm font-medium text-gray-900 px-6 py-6 text-black">Id</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-6 text-black">Libelle</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-6 text-black">Statut</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-6 text-black">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $id=1 @endphp
                            @forelse($anneeScolaire as $item)
                                <tr class="border-b-2 border-gray-100">
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">{{ $id++ }}</th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">{{ $item->school_year }}</th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">
                                        @if($item->active != 0)
                                            <span class="text-sm bg-green-400 p-1 text-white rounded-sm">Actif</span>
                                        @else
                                        <span class="text-sm bg-red-400 p-1 text-white rounded-sm">Inactif</span>
                                        @endif
                                    </th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">
                                            <button class="text-sm p-2 
                                                {{ $item->active == 1 ? 'bg-red-400' : 'bg-green-400' }} 
                                                    text-white rounded-sm" wire:click="activerOuDesactiver({{ $item->id }})">
                                                {{ $item->active == 1 ? "Désactiver" : "Activer" }}
                                            </button>
                                    </th>
                                </tr>
                            @empty
                                <tr class="w-full">
                                    <td  class="flex-1 items-center justify-center"  colspan='4'>
                                        <div>
                                            <p class="flex justify-center content-center p-4">
                                                <img src="{{ asset('img/empty.svg') }}" alt="aucun élément trouvé en base de donnée."
                                                class="w-20 h-20">
                                                <div>Aucun élément trouvé !</div>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                   <div class="mt-3">
                        {{ $anneeScolaire->links() }}
                   </div>
               </div>
            </div>
       </div>

    </div>
</div>
