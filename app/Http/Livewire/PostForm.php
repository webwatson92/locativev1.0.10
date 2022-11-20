<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostForm extends Component
{
    public $title; 
    public $content;
    public $modelId;

    protected $listeners = [
        "getModelId",
        "forcedCloseModal"
    ];

    public function getModelId($modelId){
        $this->modelId = $modelId;
        $model = Post::find($this->modelId);
        $this->title = $model->title;
        $this->content = $model->content;
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
            'title' => 'required|min:5|max:15',
            'content' => 'required|min:10|max:150',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    
    public function save(){
       $data = [
        'title' => $this->title,
        'content' => $this->content,
        'user_id' => auth()->user()->id,
       ];

       if($this->modelId){
            Post::find($this->modelId)->update($data);
       }else{
            Post::create($data);
       }

       $this->emit('refreshParent');
       $this->dispatchBrowserEvent('closeModal');
       $this->clearVars();
       session()->flash('message', "pays ajouté avec succès !");
    }

    private function clearVars(){
        $this->modelId = null;
        $this->title = null;
        $this->content = null;
    }

    public function render()
    {
        return view('livewire.post-form');
    }
}