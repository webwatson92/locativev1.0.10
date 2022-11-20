<?php

namespace App\Http\Livewire\Menu\Params;

use App\Models\Quartier;

use Livewire\Component;
use Livewire\WithPagination;

class QuartierComponent extends Component
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
    //Quartier delete
    public function delete(){
        Quartier::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {
        $quartier = Quartier::with('pays', 'ville')->orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.menu.params.quartier-component', compact('quartier'));
    }
}
