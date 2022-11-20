<?php

namespace App\Http\Livewire\Menu\Fonction;

use Livewire\Component;
use App\Models\{Quartier, Ville, Pays, Chauffeur, Gerant, CatPermis};
use Livewire\WithFileUploads;
use Carbon\Carbon;

class ChauffeurForm extends Component
{
    use WithFileUploads;
    public $code, $nom, $prenom, $email, $password, $numero_tel, $adresse,$sexe, $urlName, $newurl,
            $date_expiration_permis, $quartier_id, $ville_id, $pays_id, $cat_permis_id, $gerant_id, $note, $url;

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
        $model = Chauffeur::find($this->modelId);
        $this->code = $model->code;
        $this->nom = $model->nom;
        $this->prenom = $model->prenom;
        $this->email = $model->email;
        $this->numero_tel = $model->numero_tel;
        $this->adresse = $model->adresse;
        $this->sexe = $model->sexe;
        $this->quartier_id = $model->quartier_id;
        $this->ville_id = $model->ville_id;
        $this->pays_id = $model->pays_id;
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
                'nom' => "required|string|",
                'prenom' => "required|string|",
                'email' => "required|string",
                'password' => "required|string|min:8",
            ]);
        }
        elseif($this->currentStep == 2){
            $this->validate([
                'numero_tel' => "required|string|",
                'adresse' => "required|string",
                'sexe' => "required|string",
                'date_expiration_permis' => "required|string|date",
                'quartier_id' => "required|integer"
            ]);
        }
    }

    public function save(){
        if($this->currentStep == 3){
            $this->validate([
                'ville_id' => "required|integer",
                'pays_id' => "required|integer",
                'cat_permis_id' => "required|integer",
                'gerant_id' => "required|integer",
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
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'email' => $this->email,
                'password' => $this->password,
                'numero_tel' => $this->numero_tel,
                'adresse' => $this->adresse,
                'sexe' => $this->sexe,
                'date_expiration_permis' => $this->date_expiration_permis,
                'quartier_id' => $this->quartier_id,
                'ville_id' => $this->ville_id,
                'pays_id' => $this->pays_id,
                'cat_permis_id' => $this->cat_permis_id,
                'gerant_id' => $this->gerant_id,
                'note' => $this->note,
                'url' => $this->url,
            ];
            //dd($data);
            if($this->modelId){
                    Chauffeur::find($this->modelId)->update($data);
            }else{
                    Chauffeur::insert($data);
            }
        
            $this->emit('refreshParent');
            $this->dispatchBrowserEvent('closeModal');
            $this->clearVars();
            session()->flash('message', "Chauffeur ajouté avec succès !");
                       
        }
    }

    private function clearVars(){
        $this->modelId = null;
        $this->code = null;
        $this->nom = null;
        $this->prenom = null;
        $this->email = null;
        $this->password = null;
        $this->numero_tel = null;
        $this->adresse = null;
        $this->sexe  = null;
        $this->date_expiration_permis  = null;
        $this->quartier_id = null;
        $this->ville_id = null;
        $this->pays_id = null;
        $this->cat_permis_id = null;
        $this->gerant_id = null;
        $this->note = null;
        $this->url = null;
    }

    public function render()
    {
        $ville = Ville::all();
        $pays = Pays::all();
        $quartier = Quartier::all();
        $gerant = Gerant::all();
        $catpermis = CatPermis::all();
        return view('livewire.menu.fonction.chauffeur-form', compact("ville","pays","quartier","gerant", "catpermis"));
    }
}
