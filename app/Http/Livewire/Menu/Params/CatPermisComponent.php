<?php

namespace App\Http\Livewire\Menu\Params;

use App\Models\CatPermis;

use Livewire\Component;
use Livewire\WithPagination;

class CatPermisComponent extends Component
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
    //CatPermis delete
    public function delete(){
        CatPermis::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {   
        $catpermis = CatPermis::orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.menu.params.cat-permis-component', compact("catpermis"));
    }
}
