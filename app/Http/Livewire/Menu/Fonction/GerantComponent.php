<?php

namespace App\Http\Livewire\Menu\Fonction;

use App\Models\User;

use Livewire\Component;
use Livewire\WithPagination;

class GerantComponent extends Component
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
    //Gerant delete
    public function delete(){
        User::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {   
        $gerant = User::with('quartier', 'pays', 'ville', 'societe')->orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.menu.fonction.gerant-component', compact('gerant'));
    }
}
