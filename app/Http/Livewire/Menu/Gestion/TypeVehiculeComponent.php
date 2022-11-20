<?php

namespace App\Http\Livewire\Menu\Gestion;

use Livewire\Component;
use App\Models\TypeVehicule;

use Livewire\WithPagination;

class TypeVehiculeComponent extends Component
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
    //TypeVehicule delete
    public function delete(){
        TypeVehicule::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {
        $tv = TypeVehicule::orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.menu.gestion.type-vehicule-component', compact('tv'));
    }
}
