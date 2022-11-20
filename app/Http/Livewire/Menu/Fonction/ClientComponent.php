<?php

namespace App\Http\Livewire\Menu\Fonction;

use App\Models\{Client, User};
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use PDF;
use Livewire\WithPagination;

class ClientComponent extends Component
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

    public function getPostPdf (Client $client)
    {
        // L'instance PDF avec une vue : resources/views/posts/show.blade.php
        $pdf = PDF::loadView('menu.fonction.client-component', compact('client'));
        return $pdf->stream();
    }
                

    public function render()
    {   
        $user = User::with("clients", "pays", 'ville', 'societe')
                ->where('id', Auth::user()->id)->paginate(10);
                
        return view('livewire.menu.fonction.client-component', compact('user'));
    }
}
