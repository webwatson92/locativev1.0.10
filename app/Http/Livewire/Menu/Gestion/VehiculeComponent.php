<?php

namespace App\Http\Livewire\Menu\Gestion;

use App\Models\Vehicule;

use Livewire\Component;
use Livewire\WithPagination;

class VehiculeComponent extends Component
{    
    use WithPagination;
    public $prompt, $action, $selectedItem; 

    protected $listeners = [
        'refreshParent' => '$refresh'
    ];

    //Get delete or update
    public function selectItem($itemId, $action){
        $this->selectedItem = $itemId; 
         $this->action = $action; 
        if($action == 'delete'){
            $this->dispatchBrowserEvent('openDeleteModal');
        }else{
            $this->emit('getModelId', $this->selectedItem);
            $this->dispatchBrowserEvent('openModal');
        }
    }
    //Vehicule delete
    public function delete(){
        Vehicule::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {   
        $vehicule = Vehicule::with('type_vehicule', 'type_energie', 'boite_vitesse', 'user')->orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.menu.gestion.vehicule-component', compact('vehicule'));
    }
}
