<?php

namespace App\Http\Livewire\Menu\Params;

use App\Models\Pays;

use Livewire\Component;
use Livewire\WithPagination;

class PaysComponent extends Component
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
    //Pays delete
    public function delete(){
        Pays::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {
        $pays = Pays::orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.menu.params.pays-component', compact('pays'));
    }
}
