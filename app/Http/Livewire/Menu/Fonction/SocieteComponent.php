<?php

namespace App\Http\Livewire\Menu\Fonction;

use App\Models\Societe;

use Livewire\Component;
use Livewire\WithPagination;

class SocieteComponent extends Component
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
    //Societe delete
    public function delete(){
        Societe::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {   
        $societe = Societe::with('quartier', 'pays', 'ville')->orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.menu.fonction.societe-component', compact('societe'));
    }
}
