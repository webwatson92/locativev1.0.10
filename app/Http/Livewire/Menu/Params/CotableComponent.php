<?php

namespace App\Http\Livewire\Menu\Params;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cotable;

class CotableComponent extends Component
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
    //Cotable delete
    public function delete(){
        Cotable::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {
        $cotable = Cotable::orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.menu.params.cotable-component', compact('cotable'));
    }
}
