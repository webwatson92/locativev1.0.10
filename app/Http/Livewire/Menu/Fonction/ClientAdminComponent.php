<?php

namespace App\Http\Livewire\Menu\Fonction;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ClientAdminComponent extends Component
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
    //Client delete
    public function delete(){
        Client::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {   
        $client = Client::with('quartier', 'pays', 'ville', 'user', 'societe')
                ->orderBy('created_at', 'DESC')->paginate(10);
                return view('livewire.menu.fonction.client-admin-component', compact('client'));
    }
}
