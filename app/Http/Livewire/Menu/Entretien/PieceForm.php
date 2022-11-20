<?php

namespace App\Http\Livewire\Menu\Entretien;

use Livewire\Component;
use App\Models\{Piece,TypePiece};

class PieceForm extends Component
{
    public $code, $libelle, $pu, $type_piece_id, $note;
    public $modelId;

    protected $listeners = [
        "getModelId",
        "forcedCloseModal"
    ];

    public function getModelId($modelId){
        $this->modelId = $modelId;
        $model = Piece::find($this->modelId);
        $this->code = $model->code;
        $this->libelle = $model->libelle;
        $this->pu = $model->pu;
        $this->type_piece_id = $model->type_piece_id;
        $this->note = $model->note;
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
            'code' => '',
            'libelle' => 'required|min:2|max:20',
            'pu' => 'required|',
            'type_piece_id' => 'required|integer',
            'note' => 'required|min:2|max:20',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    
    public function save(){
       $data = [
        'code' => $this->code,
        'libelle' => $this->libelle,
        'pu' => $this->pu,
        'type_piece_id' => $this->type_piece_id,
        'note' => $this->note,
       ];

       if($this->modelId){
            Piece::find($this->modelId)->update($data);
       }else{
            Piece::create($data);
       }

       $this->emit('refreshParent');
       $this->dispatchBrowserEvent('closeModal');
       $this->clearVars();
       session()->flash('message', "Catégorie de permis a été ajouté avec succès !");
    }

    private function clearVars(){
        $this->modelId = null;
        $this->code = null;
        $this->libelle = null;
        $this->pu = null;
        $this->type_piece_id = null;
        $this->note = null;
    }
    public function render()
    {
        $tp = TypePiece::all();
        return view('livewire.menu.entretien.piece-form', compact('tp'));
    }
}
