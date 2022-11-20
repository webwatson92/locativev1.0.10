<?php

namespace App\Http\Livewire\Menu\Location;

use Livewire\Component;
use App\Models\Reservation;

class ReservationForm extends Component
{
    public $code; 
    public $libelle;
    public $statut_reservation;
    public $modelId;

    protected $listeners = [
        "getModelId",
        "forcedCloseModal"
    ];

    public function getModelId($modelId){
        $this->modelId = $modelId;
        $model = Reservation::find($this->modelId);
        $this->code = $model->code;
        $this->libelle = $model->libelle;
        $this->statut_reservation = $model->statut_reservation;
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
            'code' => 'required|min:2|max:10',
            'libelle' => 'required|min:2|max:20',
            'statut_reservation' => 'required',
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
        'statut_reservation' => $this->statut_reservation,
       ];

       if($this->modelId){
            Reservation::find($this->modelId)->update($data);
       }else{
            Reservation::create($data);
       }

       $this->emit('refreshParent');
       $this->dispatchBrowserEvent('closeModal');
       $this->clearVars();
       session()->flash('message', "Reservation ajouté avec succès !");
    }

    private function clearVars(){
        $this->modelId = null;
        $this->code = null;
        $this->libelle = null;
        $this->statut_reservation = null;
    }
    
    public function render()
    { 
        return view('livewire.menu.location.reservation-form');
    }
}
