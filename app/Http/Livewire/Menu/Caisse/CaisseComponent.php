<?php

namespace App\Http\Livewire\Menu\Caisse;

use Livewire\Component;
use App\Models\Caisse;
use Livewire\WithPagination;

class CaisseComponent extends Component
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
    //Caisse delete
    public function delete(){
        Caisse::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {   
        $caisse= Caisse::orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.menu.caisse.caisse-component', compact('caisse'));
    }
}
