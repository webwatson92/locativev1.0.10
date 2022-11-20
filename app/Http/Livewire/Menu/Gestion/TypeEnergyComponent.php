<?php

namespace App\Http\Livewire\Menu\Gestion;

use Livewire\Component;
use App\Models\TypeEnergy;

use Livewire\WithPagination;

class TypeEnergyComponent extends Component
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
    //TypeEnergy delete
    public function delete(){
        TypeEnergy::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {
        $te = TypeEnergy::orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.menu.gestion.type-energy-component', compact('te'));
    }
}
