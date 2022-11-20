<?php

namespace App\Http\Livewire\Menu\Params;

use App\Models\Ville;

use Livewire\Component;
use Livewire\WithPagination;

class VilleComponent extends Component
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
    //Ville delete
    public function delete(){
        Ville::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {
        $ville = Ville::with('pays')->orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.menu.params.ville-component', compact('ville'));
    }
}
