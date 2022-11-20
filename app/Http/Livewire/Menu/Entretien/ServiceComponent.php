<?php

namespace App\Http\Livewire\Menu\Entretien;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceComponent extends Component
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
    //Service delete
    public function delete(){
        Service::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {   
        $service = Service::with('type_service', 'societe', 'gerant')->orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.menu.entretien.service-component', compact('service'));
    }
}
