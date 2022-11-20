<?php

namespace App\Http\Livewire\Menu\Location;

use Livewire\Component;
use App\Models\Validation;

class ValidationForm extends Component
{
    
    public $option_validation;
    public $modelId;

    protected $listeners = [
        "getModelId",
        "forcedCloseModal"
    ];

    public function getModelId($modelId){
        $this->modelId = $modelId;
        $model = Validation::find($this->modelId);
        // $this->code = $model->code;
        // $this->libelle = $model->libelle;
        $this->option_validation = $model->option_validation;
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
            // 'code' => 'required|min:2|max:10',
            // 'libelle' => 'required|min:2|max:20',
            'option_validation' => '',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    
    public function save(){
       $data = [
        // 'code' => $this->code,
        // 'libelle' => $this->libelle,
        'option_validation' => $this->option_validation,
       ];
       
       if($this->modelId){
            Validation::find($this->modelId)->update($data);
       }else{
            Validation::create($data);
       }

       $this->emit('refreshParent');
       $this->dispatchBrowserEvent('closeModal');
       $this->clearVars();
       session()->flash('message', "Validation ajouté avec succès !");
    }

    private function clearVars(){
        $this->modelId = null;
        // $this->code = null;
        // $this->libelle = null;
        $this->option_validation = null;
    }

    public function render(){
        return view('livewire.menu.location.validation-form');
    }
}
