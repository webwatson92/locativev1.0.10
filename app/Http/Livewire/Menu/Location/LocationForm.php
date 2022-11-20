<?php

namespace App\Http\Livewire\Menu\Location;

use Livewire\Component;
use App\Models\{Location, user, Vehicule, Societe, Validation, 
    Tarification, Chauffeur, Client, Reservation};
use Livewire\WithFileUploads;
USE Carbon\Carbon;
use Auth;

class LocationForm extends Component
{
    use WithFileUploads;

    public $code, $client_id, $vehicule_id, $chauffeur_id, $date_debut, $date_fin, $pu_journalier, 
           $prix_total, $qte, $va_payer, $va_rester_a_payer, $tarification_id, $option_tarification, $validation_id,
           $option_validation, $societe_id,  $reservation_id, $statut_reservation, $user_id, $note, $newurl;
    
    public $url;
    public $modelId;

    public $totalStep = 4;
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
        $model = Location::find($this->modelId);
        $this->code = $model->code;
        $this->client_id = $model->client_id;
        $this->validation_id = $model->validation_id;
        $this->chauffeur_id = $model->chauffeur_id;
        $this->date_debut = $model->date_debut;
        $this->date_fin= $model->date_fin;
        $this->pu_journalier = $model->pu_journalier;
        $this->qte = $model->qte;
        $this->prix_total = $model->prix_total;
        $this->va_payer = $model->va_payer;
        $this->va_rester_a_payer = $model->va_rester_a_payer;
        $this->tarification_id = $model->tarification_id;
        $this->option_tarification = $model->option_tarification;
        $this->option_validation = $model->option_validation;
        $this->societe_id = $model->societe_id;
        $this->reservation_id = $model->reservation_id;
        $this->statut_reservation = $model->statut_reservation;
        $this->user_id = Auth::user()->id;
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
                'client_id' => "",
                'vehicule_id' => "",
                'chauffeur_id' => "",
                'date_debut' => "",
                'date_fin' => "",
            ]);
        }   
        elseif($this->currentStep == 2){
            $this->validate([
                'pu_journalier' => "integer|required",
                'qte' => "integer|required",
                // 'prix_total' => "integer|required",
                'va_payer' => "integer|required",
                'va_rester_a_payer' =>"integer|required",
                'tarification_id' => "",
            ]);
        }
        elseif($this->currentStep == 3){
            $this->validate([
                'option_tarification' => "",
                'validation_id' => "",
                'societe_id' => "",
                'reservation_id' => "",
            ]);
        }
    }

    public function save(){
        if($this->currentStep == 4){
            $this->validate([
                'statut_reservation' => "",
                'user_id' => "",
                'note' => "",
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
                    unlink('assets/documents/'.$this->url);
                }
                $urlName = Carbon::now()->timestamp . '.' . $this->newurl->extension();
                $this->newurl->storeAs('documents', $urlName);
                $this->url = $urlName;
            }

            $data = [
                'code' => $this->code,
                'client_id' => $this->client_id,
                'vehicule_id' => $this->vehicule_id,
                'chauffeur_id' => $this->chauffeur_id,
                'date_debut' => $this->date_debut,
                'date_fin' => $this->date_fin,
                'pu_journalier' => $this->pu_journalier,
                'qte' => $this->qte,
                'prix_total' => $this->pu_journalier * $this->qte,
                'va_payer' => $this->va_payer,
                'va_rester_a_payer' => $this->va_rester_a_payer,
                'tarification_id' => $this->tarification_id,
                'option_tarification' => $this->option_tarification,
                'societe_id' => $this->societe_id,
                'reservation_id' => $this->reservation_id,
                'statut_reservation' => $this->statut_reservation,
                'user_id' => Auth::user()->id,
                'note' => $this->note,
                'url' => $this->url,
            ];
            // dd($data);
            if($this->modelId){
                    Location::find($this->modelId)->update($data);
            }else{
                    Location::insert($data);
            }
        
            $this->emit('refreshParent');
            $this->dispatchBrowserEvent('closeModal');
            $this->clearVars();
            session()->flash('message', "Location ajouté avec succès !");
                       
        }
    }

    private function clearVars(){
                $this->modelId = null;
                $this->code = null;
                $this->client_id = null;
                $this->vehicule_id = null;
                $this->chauffeur_id = null;
                $this->date_debut = null;
                $this->date_fin = null;
                $this->pu_journalier = null;
                $this->prix_total = null;
                $this->va_payer = null;
                $this->va_rester_a_payer = null;
                $this->tarification_id = null;
                $this->option_tarification = null;
                $this->option_validation = null;
                $this->societe_id = null;
                $this->reservation_id = null;
                $this->statut_reservation = null;
                $this->user_id = null;
                $this->note = null;
                $this->url = null;
    }

    public function render()
    {
        $vehicule = Vehicule::all();
        $client = Client::all();
        $validation = validation::all();
        $chauffeur = Chauffeur::all();
        $tarification = Tarification::all();
        $societe = Societe::all();
        $reservation = Reservation::all();
        return view('livewire.menu.location.location-form', compact('vehicule', 'client', 'validation', 'chauffeur',
            'tarification', 'societe', 'reservation'
        ));
    }
}
