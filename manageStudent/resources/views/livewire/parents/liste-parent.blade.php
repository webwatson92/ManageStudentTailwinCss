<div class="mt-5">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
        {{-- Titre et bouton crée--}}
        <div class="flex justify-between items-center">
            
            <input wire:model="search" placeholder="Nom, prenom ou email" type="text" class="block mt-1 border-gray-300 rounded-md">

            <a href="{{ route('creation.parentEleve') }}" class="bg-blue-500 rounded-md p-2 text-white">
                {{ __("Créer un compte parent") }}
            </a>
        </div>
        {{-- section message flash avec sweetAlert --}}
        @include('sweetalert::alert')
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
                                <th class="text-sm font-medium text-gray-900 px-6 py-6 text-black">Nom</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-6 text-black">Prénom</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-6 text-black">Email</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-6 text-black">Contact</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-6 text-black">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $id=1 @endphp
                            @forelse($listeParent as $item)
                                <tr class="border-b-2 border-gray-100">
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">{{ $id++ }}</th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">{{ $item->nom }}</th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">{{ $item->prenom }}</th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">{{ $item->email }}</th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">{{ $item->contact }}</th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">
                                            <a href="{{ route('edition.parentEleve', $item->id) }}" class="p-1 rounded-sm bg-blue-400"><i class="fa-solid fa-pencil"></i></a>
                                            <button data-confirm-delete="true" wire:click='supprimerParent({{ $item->id }})' class="p-1 rounded-sm bg-red-400"><i class="fa-solid fa-trash-can"></i></button>
                                    </th>
                                </tr>
                            @empty
                                <tr class="w-full">
                                    <td  class="flex-1 items-center justify-center"  colspan='10'>
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
                        {{ $listeParent->links() }}
                   </div>
               </div>
            </div>
       </div>

    </div>
</div>
