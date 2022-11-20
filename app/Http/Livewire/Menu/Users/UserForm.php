<?php

namespace App\Http\Livewire\Menu\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPaginate;

class UserForm extends Component
{
    public $name, $email, $role, $password, $modelId;

    protected $listeners = [
        "getModelId",
        "forcedCloseModal"
    ];

    public function getModelId($modelId){
        $this->modelId = $modelId;
        $model = User::find($this->modelId);
        $this->name = $model->name;
        $this->email = $model->email;
        $this->role = $model->role;
    }

    public function forcedCloseModal(){
        //This is to reset our public variables
        $this->clearVars();

        //these will reset our errors bags
        $this->resetErrorBag();
        $this->resetValidation();
    }

    protected function rules()
    {
        return [
            'name' => 'required|min:2|max:10',
            'email' => 'required|string|email:uniques',
            'role' => 'required|string',
            'password' => 'required|string|min:8',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    
    public function saveuser(){
       $data = [
        'name' => $this->name,
        'email' => $this->email,
        'role' => $this->role,
        'password' => Hash::make($this->password),
        
       ];
       if($this->modelId){
            User::find($this->modelId)->update($data);
       }else{
            User::create($data);
       }

       $this->emit('refreshParent');
       $this->dispatchBrowserEvent('closeModal');
       $this->clearVars();
       session()->flash('message', "User ajouté avec succès !");
    }

    private function clearVars(){
        $this->modelId = null;
        $this->name = null;
        $this->email = null;
        $this->email = null;
    }

    public function render()
    {
        $users = User::paginate(8);
        // dd($users);
        return view('livewire.menu.users.user-form', compact('users'));
    }
}
