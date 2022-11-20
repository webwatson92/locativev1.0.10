<?php

namespace App\Http\Livewire\Menu\Caisse;

use Livewire\Component;
use App\Models\TypeMouvement;

class TypeMouvementForm extends Component
{
    public $code, $libelle, $nature_mvm, $modelId;

    protected $listeners = [
        "getModelId",
        "forcedCloseModal"
    ];

    public function getModelId($modelId){
        $this->modelId = $modelId;
        $model = TypeMouvement::find($this->modelId);
        $this->code = $model->code;
        $this->libelle = $model->libelle;
        $this->nature_mvm = $model->libelle;
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
            'libelle' => 'required',
            'nature_mvm' => 'required',
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
        'nature_mvm' => $this->nature_mvm,
       ];

       if($this->modelId){
            TypeMouvement::find($this->modelId)->update($data);
       }else{
            TypeMouvement::create($data);
       }

       $this->emit('refreshParent');
       $this->dispatchBrowserEvent('closeModal');
       $this->clearVars();
       session()->flash('message', "Type de mouvement ajouté avec succès !");
    }

    private function clearVars(){
        $this->modelId = null;
        $this->code = null;
        $this->libelle = null;
        $this->nature_mvm = null;
    }
    
    public function render()
    {
        return view('livewire.menu.caisse.type-mouvement-form');
    }
}
