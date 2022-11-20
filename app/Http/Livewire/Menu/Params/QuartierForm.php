<?php

namespace App\Http\Livewire\Menu\Params;

use Livewire\Component;
use App\Models\{Quartier, Ville, Pays};

class QuartierForm extends Component
{
    public $code; 
    public $libelle;
    public $ville_id;
    public $pays_id;
    public $modelId;

    protected $listeners = [
        "getModelId",
        "forcedCloseModal"
    ];

    public function getModelId($modelId){
        $this->modelId = $modelId;
        $model = Quartier::find($this->modelId);
        $this->code = $model->code;
        $this->libelle = $model->libelle;
        $this->ville_id = $model->ville_id;
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
            'ville_id' => 'required|integer',
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
        'ville_id' => $this->ville_id,
        'pays_id' => $this->pays_id
       ];

       if($this->modelId){
            Quartier::find($this->modelId)->update($data);
       }else{
            Quartier::create($data);
       }

       $this->emit('refreshParent');
       $this->dispatchBrowserEvent('closeModal');
       $this->clearVars();
       session()->flash('message', "Quartier ajouté avec succès !");
    }

    private function clearVars(){
        $this->modelId = null;
        $this->code = null;
        $this->libelle = null;
        $this->ville_id = null;
        $this->pays_id = null;
    }

    public function render()
    {
        $ville = Ville::all();
        $pays = Pays::all();
        return view('livewire.menu.params.quartier-form', compact('ville', 'pays'));
    }
}
