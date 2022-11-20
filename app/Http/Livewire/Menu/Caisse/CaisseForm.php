<?php

namespace App\Http\Livewire\Menu\Caisse;

use Livewire\Component;
use App\Models\{Vehicule, Client, Societe, Gerant, TypeMouvement, Location, Caisse, Fourniture};

class CaisseForm extends Component
{
    public $code, $libelle, $date, $periode, $heure, $valeur, $solde, 
           $type_mouvement_id, $client_id, $fourniture_id, $location_id, $nature_mvm, $observation,
           $societe_id, $gerant_id, $note, $url; 
    public $modelId;

    public $totalStep = 4;
    public $currentStep = 1;

    public function mount(){
        $this->currentStep = 1; 
    }

    protected $listeners = [
        "getModelId",
        "forcedCloseModal"
    ];

    public function increaseStep(){
        $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalStep){
            $this->currentStep = $this->totalStep;
        }
    }

    public function decreaseStep(){
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

    public function getModelId($modelId){
        $this->modelId = $modelId;
        $model = Caisse::find($this->modelId);
        $this->code = $model->code;
        $this->libelle = $model->libelle;
        $this->date = $model->date;
        $this->periode = $model->periode;
        $this->heure = $model->heure;
        $this->valeur= $model->valeur;
        $this->solde = $model->solde;
        $this->type_mouvement_id = $model->type_mouvement_id;
        $this->client_id = $model->client_id;
        $this->fourniture_id = $model->fourniture_id;
        $this->location_id = $model->location_id;
        $this->nature_mvm = $model->nature_mvm;
        $this->observation = $model->observation;
        $this->societe_id = $model->societe_id;
        $this->gerant_id = $model->gerant_id;
        $this->note = $model->note;
        $this->url = $model->url;
    }

    public function forcedCloseModal(){
        //This is to reset our public variables
        $this->clearVars();

        //these will reset our errors bags
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function validateData(){
        if($this->currentStep == 1){
            $this->validate([
                'libelle' => "",
                'date' => "",
                'periode' => "",
                'heure' => "",
                'valeur' => "",
            ]);
        }   
        elseif($this->currentStep == 2){
            $this->validate([
                'solde' => "",
                'type_mouvement_id' => "",
                'client_id' => "",
                'fourniture_id' => "",
                'location_id' => "",
            ]);
        }
        elseif($this->currentStep == 3){
            $this->validate([
                'nature_mvm' => "",
                'observation' => "",
                'societe_id' => "",
            ]);
        }
    }

    public function save(){
        if($this->currentStep == 4){
            $this->validate([
                'gerant_id' => "",
                'note' => "",
                'url' => "string",
            ]);

            $data = [
                'code' => $this->code,
                'libelle' => $this->libelle,
                'vehicule_id' => $this->date,
                'periode' => $this->periode,
                'heure' => $this->heure,
                'valeur' => $this->valeur,
                'solde' => $this->solde,
                'type_mouvement_id' => $this->type_mouvement_id,
                'client_id' => $this->client_id,
                'fourniture_id' => $this->fourniture_id,
                'location_id' => $this->location_id,
                'nature_mvm' => $this->nature_mvm,
                'observation' => $this->observation,
                'societe_id' => $this->societe_id,
                'gerant_id' => $this->gerant_id,
                'note' => $this->note,
                'url' => $this->url,
            ];
            //dd($data);
            if($this->modelId){
                    Caisse::find($this->modelId)->update($data);
            }else{
                    Caisse::insert($data);
            }
        
            $this->emit('refreshParent');
            $this->dispatchBrowserEvent('closeModal');
            $this->clearVars();
            session()->flash('message', "Caisse ajouté avec succès !");
                       
        }
    }

    private function clearVars(){
                $this->modelId = null;
                $this->code = null;
                $this->libelle = null;
                $this->vehicule_id = null;
                $this->periode = null;
                $this->heure = null;
                $this->valeur = null;
                $this->solde = null;
                $this->type_mouvement_id = null;
                $this->client_id = null;
                $this->fourniture_id = null;
                $this->location_id = null;
                $this->nature_mvm = null;
                $this->observation = null;
                $this->societe_id = null;
                $this->gerant_id = null;
                $this->note = null;
                $this->url = null;
    }

    public function render()
    {
        $vehicule = Vehicule::all();
        $client = Client::all();
        $societe = Societe::all();
        $gerant = Gerant::all();
        $location = Location::all();
        $tm = TypeMouvement::all();
        $fourniture = Fourniture::all();
        return view('livewire.menu.caisse.caisse-form', compact('vehicule', 'fourniture', 'client', 'societe', 'gerant', 'location', 'tm'));
    }
}
