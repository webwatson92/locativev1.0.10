<?php

namespace App\Http\Livewire\Menu\Entretien;

use Livewire\Component;
use App\Models\{TypeService, Service, Gerant, Societe};

class ServiceForm extends Component
{
    public $code, $date, $periode, $type_service_id, $libelle, $pu, $qte, 
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
        $model = Service::find($this->modelId);
        $this->code = $model->code;
        $this->date = $model->date;
        $this->periode = $model->periode;
        $this->type_service_id = $model->type_service_id;
        $this->libelle = $model->libelle;
        $this->pu = $model->pu;
        $this->qte = $model->qte;
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
                'date' => "required|date|",
                'periode' => "required|date",
                'type_service_id' => "required|integer"
            ]);
        }
        elseif($this->currentStep == 2){
            $this->validate([
                'libelle' => "required|string|min:8",
                'pu' => "required|string",
                'qte' => "required|string",
                'societe_id' => "required|integer",
            ]);
        }
    }

    public function save(){
        if($this->currentStep == 3){
            $this->validate([
                'gerant_id' => "required|integer",
                'note' => "required",
                'url' => "string",
            ]);
            
            $data = [
                'code' => $this->code,
                'date' => $this->date,
                'periode' => $this->periode,
                'type_service_id' => $this->type_service_id,
                'libelle' => $this->libelle,
                'pu' => $this->pu,
                'qte' => $this->qte,
                'societe_id' => $this->societe_id,
                'gerant_id' => $this->gerant_id,
                'note' => $this->note,
                'url' => $this->url,
            ];
            //dd($data);
            if($this->modelId){
                    Service::find($this->modelId)->update($data);
            }else{
                    Service::insert($data);
            }
        
            $this->emit('refreshParent');
            $this->dispatchBrowserEvent('closeModal');
            $this->clearVars();
            session()->flash('message', "Service ajouté avec succès !");
                       
        }
    }

    private function clearVars(){
        $this->modelId = null;
        $this->code = null;
        $this->date = null;
        $this->periode = null;
        $this->type_service_id = null;
        $this->libelle = null;
        $this->pu = null;
        $this->qte = null;
        $this->societe_id  = null;
        $this->gerant_id = null;
        $this->ville_id = null;
        $this->pays_id = null;
        $this->note = null;
        $this->url = null;
    }

    public function render()
    {
        $societe = Societe::all();
        $gerant = Gerant::all();
        $ts = TypeService::all();
        return view('livewire.menu.entretien.service-form', compact('societe', 'gerant', 'ts'));
    }
}
