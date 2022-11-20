<?php

namespace App\Http\Livewire\Menu\Params;

use Livewire\Component;
use App\Models\Pays;

class PaysForm extends Component
{
    public $code_pays; 
    public $libelle;
    public $modelId;

    protected $listeners = [
        "getModelId",
        "forcedCloseModal"
    ];

    public function getModelId($modelId){
        $this->modelId = $modelId;
        $model = Pays::find($this->modelId);
        $this->code_pays = $model->code_pays;
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
            'code_pays' => 'required|min:2|max:10',
            'libelle' => 'required|min:2|max:20',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    
    public function save(){
       $data = [
        'code_pays' => $this->code_pays,
        'libelle' => $this->libelle,
        'user_id' => auth()->user()->id,
       ];

       if($this->modelId){
            Pays::find($this->modelId)->update($data);
       }else{
            Pays::create($data);
       }

       $this->emit('refreshParent');
       $this->dispatchBrowserEvent('closeModal');
       $this->clearVars();
       session()->flash('message', "pays ajouté avec succès !");
    }

    private function clearVars(){
        $this->modelId = null;
        $this->code_pays = null;
        $this->libelle = null;
    }
    
    public function render()
    {
        return view('livewire.menu.params.pays-form');
    }
}
