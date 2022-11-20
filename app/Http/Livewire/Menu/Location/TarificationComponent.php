<?php

namespace App\Http\Livewire\Menu\Location;

use Livewire\Component;
use App\Models\Tarification;
use Livewire\WithPagination;

class TarificationComponent extends Component
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
    //Tarification delete
    public function delete(){
        Tarification::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {   
        $tarification = Tarification::orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.menu.location.tarification-component', compact('tarification'));
    }
}
