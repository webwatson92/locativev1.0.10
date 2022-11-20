<?php

namespace App\Http\Livewire\Menu\Fonction;

use Illuminate\Support\Facades\{DB, Auth};
use Livewire\Component;
use App\Models\{Quartier, Ville, Pays, Client, Societe, User, Cotable, Requete};
use Livewire\WithFileUploads;
use Carbon\Carbon;


class ClientForm extends Component
{
    use WithFileUploads;
    
    public $code, $libelle, $reg_commerce, $numero_taxe, $numero_tel, $adresse,
           $email, $quartier_id, $ville_id, $pays_id, $societe_id, $user_id, $note, $url, $urlName,  $newurl,
           $numero, $code_id, $requete_id, $name;
    public $modelId;

    public $totalStep = 3;
    public $currentStep = 1;

    public function mount(){
        $this->currentStep = 1; 
        $cotableInfo = Cotable::where('option_codification', true)->where('formulaire', "CLIENT")->first();
        // dd($cotableInfo->codification);
        $new_code_id = $cotableInfo->codification . $cotableInfo->numero;
        $this->code = $new_code_id; 
        
        //Recuperation de l'user connecté
        $user = User::find(Auth::user()->id);
        // dd($user->id);
        $this->user_id = $user->id;
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
        $model = Client::find($this->modelId);
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
        $this->societe_id = $model->societe_id;
        $this->user_id = $model->user_id;
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
                'societe_id' => "required|integer",
                'user_id' => "required|integer",
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
                'societe_id' => $this->societe_id,
                'user_id' => $this->user_id,
                'note' => $this->note,
                'url' => $this->url,
            ];
            //dd($data);
            if($this->modelId){
                Client::find($this->modelId)->update($data);
            }else{
                //insertion d'un client
                Client::insert($data);
                //Recupération du dernier element de cotable
                $CotableId = Cotable::where('option_codification', true)->max('numero');
                $lastCotableId = DB::table('cotables')->orderBy('id', 'DESC')->first();
               
                $this->numero = $CotableId;
                $this->code_id = $lastCotableId->id;
                // dd($this->code_id);
                $lastCotableNumber = ($this->numero); //101
                // dd($lastCotableNumber);
                $lastCotableNumber = intval($lastCotableNumber);
                $newCotableId = $lastCotableNumber + 1; //102
                //  dd($newCotableId);
                $clientNumberUpdateInCotable = [
                    'numero' => getClientCode($newCotableId)
                   ];
                Cotable::find($this->code_id)->update($clientNumberUpdateInCotable);

                // Recupération du dernier element de Requet
                $CotableId = Cotable::where('option_codification', true)->max('numero');
                $lastRequeteId = DB::table('requetes')->orderBy('id', 'DESC')->first();
                
                $this->requete_id = $lastRequeteId->id;  //4
                $lastRequeteId = intval($this->requete_id);
                // dd($lastRequeteId);
                $clientNumberUpdateInRequete = [
                    'requete' => getClientCode($newCotableId)
                ];
                Requete::find($this->requete_id)->update($clientNumberUpdateInRequete);
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
        $this->societe_id = null;
        $this->user_id = null;
        $this->note = null;
        $this->url = null;
    }

    public function render()
    {
        $ville = Ville::all();
        $pays = Pays::all();
        $quartier = Quartier::all();
        $societe = Societe::all();
        $cotableInfo = Cotable::where('option_codification', true)->where('formulaire', "CLIENT")->get();
        $requeteInfo = Requete::with('societe')->where('formulaire', "CLIENT")->first();
        $users = User::find(Auth::user()->id);
        return view('livewire.menu.fonction.client-form', compact("ville", "pays", "quartier", "societe", "users", "cotableInfo", "requeteInfo"));
    }
}
