<?php

namespace App\Http\Livewire\Menu\Caisse;

use App\Models\TypeMouvement;

use Livewire\Component;
use Livewire\WithPagination;

class TypeMouvementComponent extends Component
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
    //TypeMouvement delete
    public function delete(){
        TypeMouvement::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {
        $tm = TypeMouvement::orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.menu.caisse.type-mouvement-component', compact('tm'));
    }
}
