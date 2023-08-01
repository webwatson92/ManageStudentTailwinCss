<div class="mt-5">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
        {{-- Titre et bouton crée--}}
        <div class="flex justify-between items-center">
            <div class="w-1/3">
                <input wire:model="search" placeholder="Rechercher..."  type="text" class="block mt-1 border-gray-300 rounded-md">
            </div>
            <div class="w-1/3">
                <select wire:model="selection_classe_id" class="block mt-1 w-full rounded-md border-gray-300">
                    <option></option>
                    @foreach($listeDesClasse as $item)
                        <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                    @endforeach
                </select>
            </div>
            <a href="{{ route('creation.attribution') }}" class="bg-blue-500 rounded-md p-2 text-white">
                    {{ __("Inscription dans une classe") }}
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
                                <th class="text-sm font-medium text-gray-900 px-6 py-6 text-black">Matricule</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-6 text-black">Nom</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-6 text-black">Prénom</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-6 text-black">Classe</th>
                                {{-- <th class="text-sm font-medium text-gray-900 px-6 py-6 text-black">Année scolaire</th> --}}
                                <th class="text-sm font-medium text-gray-900 px-6 py-6 text-black">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $id=1 @endphp
                            @forelse($eleveEnClasse as $item)
                                <tr class="border-b-2 border-gray-100">
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">{{ $id++ }}</th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">{{ $item->eleve->matricule  }}</th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">{{ $item->eleve->nom  }}</th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">{{ $item->eleve->prenom  }}</th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">{{ $item->classe->libelle }}</th>
                                    {{-- <th class="text-sm font-medium text-gray-900 px-6 py-6">{{ $item->school_year->school_year }} </th> --}}
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">
                                            <a href="{{ route('edition.attribution', $item->id) }}" class="p-1 rounded-sm bg-blue-400"><i class="fa-solid fa-pencil"></i></a>
                                            <button data-confirm-delete="true" wire:click='supprimerRentrerClasse({{ $item->id }})' class="p-1 rounded-sm bg-red-400"><i class="fa-solid fa-trash-can"></i></button>
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
                        {{ $eleveEnClasse->links() }}
                   </div>
               </div>
            </div>
       </div>

    </div>
</div>
