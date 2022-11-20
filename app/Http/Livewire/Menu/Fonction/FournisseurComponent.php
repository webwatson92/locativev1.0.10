<?php

namespace App\Http\Livewire\Menu\Fonction;

use App\Models\Fournisseur;

use Livewire\Component;
use Livewire\WithPagination;

class FournisseurComponent extends Component
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
    //Fournisseur delete
    public function delete(){
        Fournisseur::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {   
        $fournisseur = Fournisseur::with('quartier', 'pays', 'ville', 'gerant', 'societe')->orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.menu.fonction.fournisseur-component', compact("fournisseur"));
    }
}
