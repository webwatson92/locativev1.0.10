<?php

namespace App\Http\Livewire\Menu\Entretien;

use Livewire\Component;
use App\Models\{TypeEntretien, Entretien, Gerant, Societe, Vehicule, Fourniture, Service};

class EntretienForm extends Component
{
    public $code, $date_acquisition, $date_cession, $type_entretien_id, $libelle, $kilometrage, $kilometrage_p_v, 
           $service_id, $valeur_service, $valeur_fourniture, $valeur_total, $fourniture_id, $vehicule_id,
           $societe_id, $gerant_id, $note, $url;

    public $modelId;

    public $totalStep = 3;
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
        $model = Entretien::find($this->modelId);
        $this->code = $model->code;
        $this->date_acquisition = $model->date_acquisition;
        $this->date_cession = $model->date_cession;
        $this->type_entretien_id = $model->type_entretien_id;
        $this->libelle = $model->libelle;
        $this->kilometrage= $model->kilometrage;
        $this->kilometrage_p_v = $model->kilometrage_p_v;
        $this->service_id = $model->service_id;
        $this->valeur_service = $model->valeur_service;
        $this->valeur_fourniture = $model->valeur_fourniture;
        $this->valeur_total = $model->valeur_total;
        $this->fourniture_id = $model->fourniture_id;
        $this->vehicule_id = $model->vehicule_id;
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
                'date_acquisition' => "required|date|",
                'date_cession' => "required|date",
                'type_entretien_id' => "required|integer",
                'libelle' => "required|string|min:3",
                'kilometrage' => "required|",
            ]);
        }
        elseif($this->currentStep == 2){
            $this->validate([
                'kilometrage_p_v' => "required|",
                'service_id' => "required|integer",
                'valeur_service' => "required|integer",
                'valeur_fourniture' => "required|integer",
                'valeur_total' => "required|string",
                'fourniture_id' => "required|integer",
            ]);
        }
    }

    public function save(){
        if($this->currentStep == 3){
            $this->validate([
                'vehicule_id' => "required|integer",
                'societe_id' => "required|integer",
                'gerant_id' => "required|integer",
                'note' => "required",
                'url' => "string",
            ]);
            
            $data = [
                'code' => $this->code,
                'date_acquisition' => $this->date_acquisition,
                'date_cession' => $this->date_cession,
                'type_entretien_id' => $this->type_entretien_id,
                'libelle' => $this->libelle,
                'kilometrage' => $this->kilometrage,
                'kilometrage_p_v' => $this->kilometrage_p_v,
                'service_id' => $this->service_id,
                'valeur_service' => $this->valeur_service,
                'valeur_fourniture' => $this->valeur_fourniture,
                'valeur_total' => $this->valeur_total,
                'fourniture_id' => $this->fourniture_id,
                'vehicule_id' => $this->vehicule_id,
                'societe_id' => $this->societe_id,
                'gerant_id' => $this->gerant_id,
                'note' => $this->note,
                'url' => $this->url,
            ];
            //dd($data);
            if($this->modelId){
                    Entretien::find($this->modelId)->update($data);
            }else{
                    Entretien::insert($data);
            }
        
            $this->emit('refreshParent');
            $this->dispatchBrowserEvent('closeModal');
            $this->clearVars();
            session()->flash('message', "Entretien ajouté avec succès !");
                       
        }
    }

    private function clearVars(){
        $this->modelId = null;
        $this->code = null;
        $this->date_acquisition = null;
        $this->date_cession = null;
        $this->type_entretien_id = null;
        $this->libelle = null;
        $this->kilometrage= null;
        $this->kilometrage_p_v = null;
        $this->service_id = null;
        $this->valeur_service = null;
        $this->valeur_fourniture = null;
        $this->valeur_total = null;
        $this->fourniture_id = null;
        $this->vehicule_id = null;
        $this->societe_id  = null;
        $this->gerant_id = null;
        $this->note = null;
        $this->url = null;
    }

    public function render()
    {
        $societe = Societe::all();
        $gerant = Gerant::all();
        $ten = TypeEntretien::all();
        $fourniture = Fourniture::all();
        $vehicule = Vehicule::all();
        $service = Service::all();
        return view('livewire.menu.entretien.entretien-form', compact('societe', 'gerant', 'ten', 
                    'service', 'fourniture', 'vehicule'));
    }
}
