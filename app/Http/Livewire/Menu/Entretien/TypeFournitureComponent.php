<?php

namespace App\Http\Livewire\Menu\Entretien;

use Livewire\Component;
use App\Models\TypeFourniture;

use Livewire\WithPagination;

class TypeFournitureComponent extends Component
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
    //TypeFourniture delete
    public function delete(){
        TypeFourniture::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {
        $tf = TypeFourniture::orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.menu.entretien.type-fourniture-component', compact('tf'));
    }
}
