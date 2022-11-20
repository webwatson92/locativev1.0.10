<?php

namespace App\Http\Livewire\Menu\Fonction;

use Livewire\Component;
use App\Models\{Quartier, Ville, Pays, Societe};
use Livewire\WithFileUploads;
USE Carbon\Carbon;

class SocieteForm extends Component
{
    use WithFileUploads;
    public $code, $libelle, $reg_commerce, $numero_taxe, $numero_tel, $adresse;
    public $email, $quartier_id, $ville_id, $pays_id, $note, $url, $urlName, $newurl;
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
        $model = Societe::find($this->modelId);
        $this->code = $model->code;
        $this->libelle = $model->libelle;
        $this->reg_commerce = $model->reg_commerce;
        $this->numero_taxe = $model->numero_taxe;
        $this->numero_tel = $model->numero_tel;
        $this->adresse = $model->adresse;
        $this->email = $model->email;
        $this->quartier_id = $model->quartier_id;
        $this->ville_id = $model->ville_id;
        $this->pays_id = $model->pays_id;
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
                'libelle' => "required|string|",
                'reg_commerce' => "required|string|",
                'numero_taxe' => "required|string"
            ]);
        }
        elseif($this->currentStep == 2){
            $this->validate([
                'numero_tel' => "required|string|",
                'adresse' => "required|string",
                'email' => "required|email",
                'quartier_id' => "required|integer"
            ]);
        }
    }

    public function save(){
        if($this->currentStep == 3){
            $this->validate([
                'ville_id' => "required|integer",
                'pays_id' => "required|integer",
                'note' => "required",
                'url.*' => 'mimes:jpg,jpeg,png,pdf|max:1024',
            ]);
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
                'reg_commerce' => $this->reg_commerce,
                'numero_taxe' => $this->numero_taxe,
                'numero_tel' => $this->numero_tel,
                'adresse' => $this->adresse,
                'email' => $this->email,
                'quartier_id' => $this->quartier_id,
                'ville_id' => $this->ville_id,
                'pays_id' => $this->pays_id,
                'note' => $this->note,
                'url' => $this->url,
            ];
            //dd($data);
            if($this->modelId){
                    Societe::find($this->modelId)->update($data);
            }else{
                    Societe::insert($data);
            }
        
            $this->emit('refreshParent');
            $this->dispatchBrowserEvent('closeModal');
            $this->clearVars();
            session()->flash('message', "Société ajouté avec succès !");
                       
        }
    }

    private function clearVars(){
        $this->modelId = null;
        $this->code = null;
        $this->libelle = null;
        $this->reg_commerce = null;
        $this->numero_taxe = null;
        $this->numero_tel = null;
        $this->adresse = null;
        $this->email = null;
        $this->quartier_id = null;
        $this->ville_id = null;
        $this->pays_id = null;
        $this->note = null;
        $this->url = null;
    }

    public function render()
    {
        $ville = Ville::all();
        $pays = Pays::all();
        $quartier = Quartier::all();
        return view('livewire.menu.fonction.societe-form', compact('ville','pays', 'quartier'));
    }
}
