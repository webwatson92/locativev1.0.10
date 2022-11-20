<div>
    <br>
    <form wire:submit.prevent="save" autocomplete="off">
        {{-- <div class="form-group">
            <label for="code">Code </label>
            @if(($cotableInfo)->count() > 0 && ($requeteInfo)->count() !== 0 )
                <input required="required" disabled wire:model="code" type="text" class="form-control" wire:model="code" placeholder="Code"> 
            @else
                <input required="required"  type="text" class="form-control" wire:model="code" placeholder="Code"> 
            @endif
            <span class="text-danger">@error('code'){{$message}} @enderror</span>
        </div> --}}
        <div class="mb-3">
            <label class="form-label" for="formulaire">Formulaire</label>
            <input type="text" wire:model="formulaire" class="form-control" id="code" 
                placeholder="Nom du formulaire"">
            @if($errors->has('formulaire'))
                <p style="color:red">{{$errors->first('formulaire')}}</p>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label" for="formulaire">Société</label>
            <select wire:model="societe_id" id="societe" class="form-control">
                <option>Selectionnez la société </option>
                @foreach ($societe as $s)
                    <option value="{{ $s->id }}">{{ $s->libelle }}</option>
                @endforeach
            </select> 
            @if($errors->has('societe_id'))
                <p style="color:red">{{$errors->first('societe_id')}}</p>
            @endif       
        </div>
        <div class="mb-3">
            <label class="form-label" for="numero">Codification</label>
            <input type="text" wire:model="codification" class="form-control" id="numero" placeholder="03 premiers préfixe du formulaire">
            @if($errors->has('codification'))
                <p style="color:red">{{$errors->first('codification')}}</p>
            @endif
        </div>
        <div class="mb-3">
            <div class="form-label">Option codification</div>
            <input type="checkbox" wire:model="option_codification"  checked data-toggle="toggle">
            @if($errors->has('option_codification'))
                <p style="color:red">{{$errors->first('option_codification')}}</p>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label" for="numero">Numero</label>
            <input type="text" wire:model="numero" class="form-control" id="numero" placeholder="Saisissez le numero">
        </div>
        @if($errors->has('numero'))
            <p style="color:red">{{$errors->first('numero')}}</p>
        @endif
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
    
</div>
