<?php

namespace App\Http\Livewire\Menu\Location;

use Livewire\Component;
use App\Models\Reservation;
use Livewire\WithPagination;

class ReservationComponent extends Component
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
    //Reservation delete
    public function delete(){
        Reservation::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }
    public function render()
    {   
        $reservation = Reservation::orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.menu.location.reservation-component', compact('reservation'));
    }
}
