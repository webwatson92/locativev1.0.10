<?php

namespace App\Http\Livewire\Menu\Gestion;

use Livewire\Component;
use App\Models\TypeVehicule;

class TypeVehiculeForm extends Component
{
    public $code; 
    public $libelle;
    public $modelId;

    protected $listeners = [
        "getModelId",
        "forcedCloseModal"
    ];

    public function getModelId($modelId){
        $this->modelId = $modelId;
        $model = TypeVehicule::find($this->modelId);
        $this->code = $model->code;
        $this->libelle = $model->libelle;
    }

    public function forcedCloseModal(){
        //This is to reset our public variables
        $this->clearVars();

        //these will reset our errors bags
        $this->resetErrorBag();
        $this->resetValidation();
    }

    protected function rules()
    {
        return [
            'code' => '',
            'libelle' => 'required|min:2|max:20',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    
    public function save(){
       $data = [
        'code' => $this->code,
        'libelle' => $this->libelle,
       ];

       if($this->modelId){
            TypeVehicule::find($this->modelId)->update($data);
       }else{
            TypeVehicule::create($data);
       }

       $this->emit('refreshParent');
       $this->dispatchBrowserEvent('closeModal');
       $this->clearVars();
       session()->flash('message', "Type d'énergy ajouté avec succès !");
    }

    private function clearVars(){
        $this->modelId = null;
        $this->code = null;
        $this->libelle = null;
    }
    public function render()
    {
        return view('livewire.menu.gestion.type-vehicule-form');
    }
}
