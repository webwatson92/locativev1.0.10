<?php

namespace App\Http\Livewire\Menu\Location;

use Livewire\Component;
use App\Models\Location;
use Livewire\WithPagination;

class LocationComponent extends Component
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
    //Location delete
    public function delete(){
        Location::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {   
        $location= Location::orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.menu.location.location-component', compact('location'));
    }
}
