<?php

namespace App\Http\Livewire\Menu\Params;

use Livewire\Component;
use App\Models\{Cotable, Societe, Requete};
// use Illuminate\Support\Facades\DB;

class CotableForm extends Component
{
    public $cotable_id, $formulaire, $societe_id, $codification, $numero, $option_codification, 
            $modelId, $code;

    public  $numeroIncrement;

    protected $listeners = [
        "getModelId",
        "forcedCloseModal"
    ];

    public function mount(){
    //     $cotableInfo = Cotable::all();
    //    if(!empty($cotableInfo)){
    //         // dd($cotableInfo);
    //         $cotableInfo = Cotable::where('option_codification', true)->where('formulaire', "CLIENT")->get();
    //         $new_code_id = $cotableInfo->codification . $cotableInfo->numero;
    //         $this->code = $new_code_id;
    //    }
    }

    public function incrementNumero(){
        $this->numeroIncrement++;
    }

    public function getModelId($modelId){
        $this->modelId = $modelId;
        $model = Cotable::find($this->modelId);
        $this->cotable_id = $model->cotable_id;
        $this->formulaire = strtoupper($model->formulaire);
        $this->societe_id = $model->societe_id;
        $this->codification = $model->codification;
        $this->option_codification = $model->option_codification;
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
            'formulaire' => 'required|min:2|max:12|unique:cotables',
            'societe_id' => 'required|integer',
            'codification' => 'required|string|max:3',
            'option_codification' => 'required',
            'numero' => 'required|integer|max:3|unique:cotables',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    
    public function save(){
       $cotable = Cotable::where('option_codification', true)->max('numero');
       $cotable = intval($cotable);
        //  dd($cotable);
       if($cotable != null){
          $new_code = $cotable + 1;

          $new_code_id = $this->codification.getClientCode($new_code);
        //   dd($new_code_id);
          $data = [
            'formulaire' => strtoupper($this->formulaire),
            'societe_id' => $this->societe_id,
            'codification' => $this->codification,
            'option_codification' => $this->option_codification,
            'numero' => getClientCode($new_code)
           ];
       }else{
          $new_code = 101;
          $new_code_id = $this->codification.getClientCode($new_code);
          // dd($new_code_id);
          $data = [
            'formulaire' => strtoupper($this->formulaire),
            'societe_id' => $this->societe_id,
            'codification' => $this->codification,
            'option_codification' => $this->option_codification,
            'numero' => getClientCode($new_code)
           ];
       }

       if($this->modelId){
            $cotable = Cotable::find($this->modelId)->update($data);
       }else{
            $cotable = Cotable::create($data);
            $clientData = [
                'formulaire' => strtoupper($this->formulaire),
                'societe_id' => $this->societe_id,
                'requete' => getClientCode($new_code)
               ];
            $requete = Requete::insert($clientData);
            $cotableId = $cotable->cotable_id;
            // dd($cotableId);
       }
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal');
        $this->clearVars();
        session()->flash('message', "Cotable ajouté avec succès !");
       //here the next code
    }

    private function clearVars(){
        $this->modelId = null;
        $this->cotable_id = null;
        $this->societe_id = null;
        $this->codification = null;
        $this->option_codification = null;
        $this->numero = null;
    }
    
    public function render()
    {   
        //recuperation du dernier numero dans la table cotable
      

      
        $cotableNum = Cotable::where('numero', true)->max('id');
        $societe = Societe::all();
        
        $cotableInfo = Cotable::where('option_codification', true)->where('formulaire', "CLIENT")->get();
        // dd($cotableInfo);
        // $this->code = $new_code_id;
        $requeteInfo = Requete::with('societe')->where('formulaire', "CLIENT")->first();
        // $cotable = Cotable::where();
        $c = Cotable::with('societe')
            ->where('id', $this->id)
            ->get();
        // dd($cotable);
        return view('livewire.menu.params.cotable-form', compact('societe', 'requeteInfo', 'cotableInfo'));
    }
}
