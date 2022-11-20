<?php

namespace App\Http\Livewire\Menu\Fonction;

use App\Models\Chauffeur;

use Livewire\Component;
use Livewire\WithPagination;

class ChauffeurComponent extends Component
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
    //Chauffeur delete
    public function delete(){
        Chauffeur::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {   
        $chauffeur = Chauffeur::with('quartier', 'pays', 'ville', 'gerant')->orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.menu.fonction.chauffeur-component', compact("chauffeur"));
    }
}
