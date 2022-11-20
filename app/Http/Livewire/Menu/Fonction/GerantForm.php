<?php

namespace App\Http\Livewire\Menu\Fonction;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\{Quartier, Ville, Pays, User, Societe};

class GerantForm extends Component
{
    public $code, $name, $prenom, $email, $password, $numero_tel, $adresse,$societe_id, 
           $quartier_id, $ville_id, $pays_id, $note, $url;

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
        $model = User::find($this->modelId);
        $this->code = $model->code;
        $this->name = $model->name;
        $this->prenom = $model->prenom;
        $this->email = $model->email;
        $this->password = $model->password;
        $this->numero_tel = $model->numero_tel;
        $this->adresse = $model->adresse;
        $this->societe_id = $model->societe_id;
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
                'name' => "required|string|",
                'prenom' => "required|string|",
                'email' => "required|string"
            ]);
        }
        elseif($this->currentStep == 2){
            $this->validate([
                'password' => "required|string|min:8",
                'numero_tel' => "required|string",
                'adresse' => "required|string",
                'societe_id' => "required|integer",
            ]);
        }
    }

    public function save(){
        if($this->currentStep == 3){
            $this->validate([
                'quartier_id' => "required|integer",
                'ville_id' => "required|integer",
                'pays_id' => "required|integer",
                'note' => "required",
                'url' => "string",
            ]);
            
            $user = new User();
            $user->code = $this->code;
            $user->name = $this->name;
            $user->prenom = $this->prenom;
            $user->email = $this->email;
            $user->password = Hash::make($this->password);
            $user->numero_tel = $this->numero_tel;
            $user->adresse = $this->adresse;
            $user->societe_id = $this->societe_id;
            $user->quartier_id = $this->quartier_id;
            $user->ville_id = $this->ville_id;
            $user->pays_id = $this->pays_id;
            $user->note = $this->note;
            $user->url = $this->url;
            
            if($this->modelId){
                    User::find($this->modelId)->update($user);
            }else{
                $user->save();
            }
        
            $this->emit('refreshParent');
            $this->dispatchBrowserEvent('closeModal');
            $this->clearVars();
            session()->flash('message', "Gerant ajouté avec succès !");
                       
        }
    }

    private function clearVars(){
        $this->modelId = null;
        $this->code = null;
        $this->name = null;
        $this->prenom = null;
        $this->email = null;
        $this->password = null;
        $this->numero_tel = null;
        $this->adresse = null;
        $this->societe_id  = null;
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
        $gerant = User::all();
        $societe = Societe::all();
        return view('livewire.menu.fonction.gerant-form', compact('ville','pays',"quartier",'gerant','societe'));
    }
}
