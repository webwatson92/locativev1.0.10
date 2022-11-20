<?php

namespace App\Http\Livewire\Menu\Entretien;

use App\Models\Fourniture;
use Livewire\Component;
use Livewire\WithPagination;

class FournitureComponent extends Component
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
    //Fourniture delete
    public function delete(){
        Fourniture::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {   
        $fourniture = Fourniture::with('type_fourniture', 'societe', 'user')->orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.menu.entretien.fourniture-component', compact('fourniture'));
    }
}
