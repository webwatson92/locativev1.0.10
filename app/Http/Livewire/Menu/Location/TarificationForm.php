<?php

namespace App\Http\Livewire\Menu\Location;

use Livewire\Component;
use App\Models\Tarification;

class TarificationForm extends Component
{
    public $code, $libelle, $valeur, $option_tarification, $modelId;

    protected $listeners = [
        "getModelId",
        "forcedCloseModal"
    ];

    public function getModelId($modelId){
        $this->modelId = $modelId;
        $model = Tarification::find($this->modelId);
        $this->code = $model->code;
        $this->libelle = $model->libelle;
        $this->valeur = $model->valeur;
        $this->option_tarification = $model->option_tarification;
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
            'code' => 'required|string|min:2|max:10',
            'libelle' => 'required|string|min:2|max:20',
            'valeur' => 'required|integer|',
            'option_tarification' => '',
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
        'valeur' => $this->valeur,
        'option_tarification' => $this->option_tarification,
       ];

       if($this->modelId){
            Tarification::find($this->modelId)->update($data);
       }else{
            Tarification::create($data);
       }

       $this->emit('refreshParent');
       $this->dispatchBrowserEvent('closeModal');
       $this->clearVars();
       session()->flash('message', "Tarification ajouté avec succès !");
    }

    private function clearVars(){
        $this->modelId = null;
        $this->code = null;
        $this->libelle = null;
        $this->valeur = null;
        $this->option_tarification = null;
    }
    public function render()
    {
        return view('livewire.menu.location.tarification-form');
    }
}
