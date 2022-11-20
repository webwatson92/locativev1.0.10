<?php

namespace App\Http\Livewire\Menu\Entretien;

use Livewire\Component;
use App\Models\{TypeFourniture, Fourniture, User, Societe, Piece};
use Livewire\WithFileUploads;
USE Carbon\Carbon;
use Auth;

class FournitureForm extends Component
{
    use WithFileUploads;

    public $code, $date, $periode, $piece_id, $type_fourniture_id, $libelle, $pu, $qte, 
           $societe_id, $gerant_id, $note, $url, $urlName, $newurl;

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
        $model = Fourniture::find($this->modelId);
        $this->code = $model->code;
        $this->date = $model->date;
        $this->periode = $model->periode;
        $this->piece_id = $model->piece_id;
        $this->type_fourniture_id = $model->type_fourniture_id;
        $this->libelle = $model->libelle;
        $this->pu = $model->pu;
        $this->qte = $model->qte;
        $this->societe_id = $model->societe_id;
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
                'date' => "required|",
                'periode' => "required",
                'piece_id' => "required|integer",
                'type_fourniture_id' => "required|integer"
            ]);
        }
        elseif($this->currentStep == 2){
            $this->validate([
                'libelle' => "required|string|",
                'pu' => "required|string",
                'qte' => "required|string",
                'societe_id' => "required|integer",
            ]);
        }
    }

    public function save(){
        if($this->currentStep == 3){
            $this->validate([
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
                'date' => $this->date,
                'periode' => $this->periode,
                'piece_id' => $this->piece_id,
                'type_fourniture_id' => $this->type_fourniture_id,
                'libelle' => $this->libelle,
                'pu' => $this->pu,
                'qte' => $this->qte,
                'societe_id' => $this->societe_id,
                'user_id' => Auth::user()->id,
                'note' => $this->note,
                'url' => $this->url,
            ];
            //dd($data);
            if($this->modelId){
                    Fourniture::find($this->modelId)->update($data);
            }else{
                    Fourniture::insert($data);
            }
        
            $this->emit('refreshParent');
            $this->dispatchBrowserEvent('closeModal');
            $this->clearVars();
            session()->flash('message', "Fourniture ajouté avec succès !");
                       
        }
    }

    private function clearVars(){
        $this->modelId = null;
        $this->code = null;
        $this->date = null;
        $this->periode = null;
        $this->type_fourniture_id = null;
        $this->libelle = null;
        $this->pu = null;
        $this->qte = null;
        $this->societe_id  = null;
        $this->user_id = null;
        $this->ville_id = null;
        $this->pays_id = null;
        $this->note = null;
        $this->url = null;
    }

    public function render()
    {
        $societe = Societe::all();
        $gerant = User::all();
        $tf = TypeFourniture::all();
        $piece = Piece::all();
        return view('livewire.menu.entretien.fourniture-form', compact('societe', 'gerant', 'tf', 'piece'));
    }
}
