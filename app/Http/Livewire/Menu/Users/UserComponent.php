<?php

namespace App\Http\Livewire\Menu\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserComponent extends Component
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
    //User deleted
    public function delete(){
        User::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function refreshParent(){
        $this->prompt = "Prompt";
    }

    public function render()
    {
        $users = User::paginate(8);
        return view('livewire.menu.users.user-component', compact("users"));
    }
}
