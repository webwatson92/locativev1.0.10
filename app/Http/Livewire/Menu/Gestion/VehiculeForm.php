<?php

namespace App\Http\Livewire\Menu\Gestion;

use App\Models\{Vehicule, Societe, BoiteVitesse, TypeEnergy, TypeVehicule};
use Livewire\Component;
use Auth;

class VehiculeForm extends Component
{
    public $code, $libelle, $date_acquisition, $valeur, $kmc, $dkmc, $pvd, $dkmc2, $date_cession, $puissance, 
            $type_vehicule_id, $type_energie_id, $boite_vitesse_id, $societe_id, $gerant_id;

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
        $model = Vehicule::find($this->modelId);
        $this->code = $model->code;
        $this->libelle = $model->libelle;
        $this->date_acquisition = $model->date_acquisition;
        $this->date_cession = $model->date_cession;
        $this->valeur = $model->valeur;
        $this->puissance = $model->puissance;
        $this->type_vehicule_id = $model->type_vehicule_id;
        $this->type_energie_id = $model->type_energie_id;
        $this->boite_vitesse_id = $model->boite_vitesse_id;
        $this->societe_id = $model->societe_id;
        $this->user_id = Auth::user()->id;
        $this->kmc = $model->kmc;
        $this->dkmc = $model->dkmc;
        $this->pvd = $model->pvd;
        $this->dkmc2 = $model->dkmc2;

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
                'libelle' => "required|string|",
                'date_acquisition' => "required|string|",
                'date_cession' => "required|string",
            ]);
        }
        elseif($this->currentStep == 2){
            $this->validate([
                'valeur' => "required|integer|",
                'puissance' => "required|integer|",
                'type_vehicule_id' => "required|integer",
            ]);
        }
        elseif($this->currentStep == 3){
            $this->validate([
                'type_energie_id' => "required|integer",
                'boite_vitesse_id' => "required|integer",
                'societe_id' => "required|integer",
            ]);
        }
    }

    public function save(){
        if($this->currentStep == 4){
            $this->validate([
                'kmc' => "required|string",
                'dkmc' => "required|date",
                'pvd' => "required|string",
                'dkmc2' => "required|date",
            ]);
            
            $data = [
                'code' => $this->code,
                'libelle' => $this->libelle,
                'date_acquisition' => $this->date_acquisition,
                'date_cession' => $this->date_cession,
                'valeur' => $this->valeur,
                'puissance' => $this->puissance,
                'type_vehicule_id' => $this->type_vehicule_id,
                'type_energie_id' => $this->type_energie_id,
                'boite_vitesse_id' => $this->boite_vitesse_id,
                'societe_id' => $this->societe_id,
                'user_id' => Auth::user()->id,
                'kmc' => $this->kmc,
                'dkmc' => $this->dkmc,
                'pvd' => $this->pvd,
                'dkmc2' => $this->dkmc2

            ];
            //dd($data);
            if($this->modelId){
                    Vehicule::find($this->modelId)->update($data);
            }else{
                    Vehicule::insert($data);
            }
        
            $this->emit('refreshParent');
            $this->dispatchBrowserEvent('closeModal');
            $this->clearVars();
            session()->flash('message', "Véhicule ajouté avec succès !");
                       
        }
    }

    private function clearVars(){
        $this->modelId = null;
        $this->code = null;
        $this->libelle = null;
        $this->date_acquisition = null;
        $this->date_cession = null;
        $this->puissance = null;
        $this->type_vehicule_id = null;
        $this->type_energie_id  = null;
        $this->boite_vitesse_id = null;
        $this->societe_id = null;
        $this->user_id = null;
        $this->kmc = null;
        $this->dkmc = null;
        $this->pvd = null;
        $this->dkmc2 = null;
    }

    public function render()
    {
        $tv = TypeVehicule::all();
        $te = TypeEnergy::all();
        $bv = BoiteVitesse::all();
        $societe = Societe::all();
        return view('livewire.menu.gestion.vehicule-form', compact("tv", "te", "bv", "societe"));
    }
}
