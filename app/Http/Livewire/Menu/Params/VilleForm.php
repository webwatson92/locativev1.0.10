<?php

namespace App\Http\Livewire\Menu\Params;

use Livewire\Component;
use App\Models\{Ville, Pays};

class VilleForm extends Component
{
    public $code; 
    public $libelle;
    public $pays_id;
    public $modelId;

    protected $listeners = [
        "getModelId",
        "forcedCloseModal"
    ];

    public function getModelId($modelId){
        $this->modelId = $modelId;
        $model = Ville::find($this->modelId);
        $this->code = $model->code;
        $this->libelle = $model->libelle;
        $this->pays_id = $model->pays_id;
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
            'pays_id' => 'required|integer',
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
        'pays_id' => $this->pays_id
       ];

       if($this->modelId){
            Ville::find($this->modelId)->update($data);
       }else{
            Ville::create($data);
       }

       $this->emit('refreshParent');
       $this->dispatchBrowserEvent('closeModal');
       $this->clearVars();
       session()->flash('message', "Ville ajouté avec succès !");
    }

    private function clearVars(){
        $this->modelId = null;
        $this->code = null;
        $this->libelle = null;
        $this->pays_id = null;
    }

    public function render()
    {
        $pays = Pays::all();
        return view('livewire.menu.params.ville-form', compact('pays'));
    }
}
