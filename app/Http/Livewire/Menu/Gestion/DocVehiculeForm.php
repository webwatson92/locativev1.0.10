<?php

namespace App\Http\Livewire\Menu\Gestion;

use Livewire\Component;
use App\Models\{Societe, Vehicule, DocVehicule, User};
use Auth;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class DocVehiculeForm extends Component
{
    use WithFileUploads;

    public $code, $libelle, $date_etablissement, $date_validation, $valeur, $date_fin,
           $societe_id, $vehicule_id, $user_id, $url, $urlName, $newurl, $modelId;

    protected $listeners = [
        "getModelId",
        "forcedCloseModal"
    ];

    public function getModelId($modelId){
        $this->modelId = $modelId;
        $model = DocVehicule::find($this->modelId);
        $this->code = $model->code;
        $this->libelle = $model->libelle;
        $this->date_etablissement = $model->date_etablissement;
        $this->date_validation = $model->date_validation;
        $this->valeur = $model->valeur;
        $this->date_fin = $model->date_fin;
        $this->societe_id = $model->societe_id;
        $this->vehicule_id = $model->vehicule_id;
        $this->user_id = $model->user_id;
        $this->url = $model->url;
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
            'libelle' => 'required|string',
            'date_etablissement' => 'required|date',
            'date_validation' => 'required|date',
            'valeur' => 'required|integer',
            'date_fin' => 'required|date',
            'societe_id' => 'required|integer',
            'vehicule_id' => 'required|integer',
            'url.*' => 'mimes:jpg,jpeg,png,pdf|max:1024',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    
    public function save(){

        $users = User::find(Auth::user()->id);
        $user_id = $users->id;

        $urlName = Carbon::now()->timestamp.'.'.$this->url->extension();
        
        $this->url->storeAs('documents', $urlName);
        $this->url = $urlName;
        // dd($this->url);
        if($this->newurl)
        {
            if($this->url)
            {
                unlink('documents/'.$this->url);
            }
            $urlName = Carbon::now()->timestamp . '.' . $this->newurl->extension();
            $this->newurl->storeAs('documents', $urlName);
            $this->url = $urlName;
        }
       $data = [
        'code' => $this->code,
        'libelle' => $this->libelle,
        'date_etablissement' => $this->date_etablissement,
        'date_validation' => $this->date_validation,
        'valeur' => $this->valeur,
        'date_fin' => $this->date_fin,
        'societe_id' => $this->societe_id,
        'vehicule_id' => $this->vehicule_id,
        'user_id' => $user_id,
        'url' => $this->url,
       ];

       if($this->modelId){
            DocVehicule::find($this->modelId)->update($data);
       }else{
            DocVehicule::create($data);
       }

       $this->emit('refreshParent');
       $this->dispatchBrowserEvent('closeModal');
       $this->clearVars();
       session()->flash('message', "Document ajouté avec succès !");
    }

    private function clearVars(){
        $this->modelId = null;
        $this->code = null;
        $this->libelle = null;
        $this->date_etablissement = null;
        $this->date_validation = null;
        $this->valeur = null;
        $this->date_fin = null;
        $this->societe_id = null;
        $this->vehicule_id = null;
        $this->user_id = null;
        $this->url = null;
    }


    public function render()
    {
        $societe = Societe::all();
        $vehicule = Vehicule::all();
        return view('livewire.menu.gestion.doc-vehicule-form', compact('vehicule', 'societe'));
    }
}
