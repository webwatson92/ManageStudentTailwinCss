<div>

    <div class="w-full flex">
        <div class="w-1/3">
           <div class="custom-card p-3 bg-white rounded-md">
                <div class="title pb border-b-2 border-b-red-500">Informations</div>
                <section class="flex p-2">
                    <div class="div w-64">
                        <img src="https://ui-avatars.com/api/?name={{ $eleve->nom }}" alt="">
                    </div>
                    <section class="flex flex-col p-2">
                        <div class="flex flex-row">
                            <div class="name pr-3 font-bold">Matricule :</div>
                            <div class="name text-md uppercase">{{ $eleve->matricule }}</div>  
                        </div>
                        <div class="flex flex-row">
                            <div class="name pr-3 font-bold">{{ $eleve->nom }}</div>
                            <div class="name font-bold">{{ $eleve->prenom }}</div>  
                        </div>
                        <div class="flex flex-row">
                            <div class="name pr-2">Classe :</div>
                            <div class="name text-md">classe ici</div>  
                        </div>
                    </section>
                </section>
                
                <div class="title pb-2 border-b-2 border-b-red-500">Derniers paiement effectués</div>
               
           </div>
        </div>
        <div class="w-2/3">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, provident.
        </div>
    </div>

</div>