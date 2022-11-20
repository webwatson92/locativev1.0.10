<?php

namespace App\Http\Livewire\Menu\Gestion;

use Livewire\Component;
use App\Models\BoiteVitesse;

use Livewire\WithPagination;

class BoiteVitesseComponent extends Component
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
    //BoiteVitesse delete
    public function delete(){
        BoiteVitesse::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {
        $bv = BoiteVitesse::orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.menu.gestion.boite-vitesse-component', compact('bv'));
    }
}
