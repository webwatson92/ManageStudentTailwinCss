<?php

namespace App\Http\Livewire\Paiements;

use Alert;
use App\Models\Eleve;
use App\Models\Classe;
use App\Models\Payment;
use Livewire\Component;
use App\Models\SchoolYear;
use App\Models\Attribution;

class FairePaiment extends Component
{
    public $matricule, $classe_id, $nomComplet, $eleve_id, $montant, $error;

    public function inscriptionEleve(Payment $paiement){
        //Recupération des montants versé par l'élève
        $totalPayer = 0;
        
        $anneeActive = SchoolYear::where('active', '1')->first();
            
        //Vérification pour recupérer tous les enregistrement en double
        $rechercheSiEleveEstDejaInscritDansUneClasse = Attribution::where('eleve_id', $this->eleve_id)
                        ->where('school_year_id', $anneeActive->id)
                        ->first();
                
        //Recpérer le montant de la scolarité d'une classe en fonction du niveau
        $ClasseEleve = $rechercheSiEleveEstDejaInscritDansUneClasse->classe_id;
   //      dd($ClasseEleve);   
        $infoDeLaClasse = Classe::with('niveau')->find($ClasseEleve);
        // dd($infoDeLaClasse);
        $montantScolariteDuNiveau = $infoDeLaClasse->niveau->scolarite;

        
        //Faire le culmul des paiements déjà effectué et le comparer au montant de la scolarité
        $listeDesPaiementPayment = Payment::where('eleve_id', $this->eleve_id)
                    ->where('school_year_id', $anneeActive->id)
                    ->get();
        foreach ($listeDesPaiementPayment as $paiement) {
            $totalPayer = $totalPayer + $paiement->montant;
        }
        $operation = $totalPayer - $montantScolariteDuNiveau;
        if(($totalPayer + $this->montant) > $montantScolariteDuNiveau){
            if($operation == 0){
                //message d'information : vous avez déjà couvert votre scolarité 
                $this->error = "La scolarité de cet élève est reglé.";
            }else{
                //message d'information : vous avez déjà couvert votre scolarité 
                $this->error = "Le montant dépasse la scolarité. Il vous reste à payer ". 
                ($totalPayer + $this->montant) - $montantScolariteDuNiveau  . " FCFA";
            }

        }else{
            //On ajoute dans la bdd
            $this->validate([
                'matricule' => 'required',
                'montant' => 'integer| required',
            ]);
    
            try{
    
                if($rechercheSiEleveEstDejaInscritDansUneClasse->count() > 0){
                    $paiements = new Payment();
                    $paiements->eleve_id = $rechercheSiEleveEstDejaInscritDansUneClasse->eleve_id;
                    $paiements->classe_id = $rechercheSiEleveEstDejaInscritDansUneClasse->classe_id;
                    $paiements->school_year_id = $rechercheSiEleveEstDejaInscritDansUneClasse->school_year_id;
                    $paiements->montant = $this->montant;
                    $paiements->save();
                    Alert::toast("Paiement de scolarité effectué.", 'success');
                    return redirect()->route('paiement');
    
                }
            }catch(Exeception $e){
                //traitement de l'exeception
            }
        }

        
    }

    public function render()
    {
        if($this->matricule){
            $eleveTrouver = Eleve::where('matricule', $this->matricule)->first();
            
            if(!empty($eleveTrouver) or !is_null($eleveTrouver)){
                 $this->nomComplet = $eleveTrouver->nom ." ".$eleveTrouver->prenom;
                 
                 //sauvegarde de l'id de l'élève
                 $this->eleve_id = $eleveTrouver->id;
            }else{
                 $this->nomComplet = '';
            }
         }
        
        
        return view('livewire.paiements.faire-paiment');
    }
}
