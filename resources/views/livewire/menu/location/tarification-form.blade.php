<div>
    {{-- selected : {{ $modelId }} --}}
    <br>
    <form wire:submit.prevent="save">
        <label class="control-label">Code</label>
        <input type="text" wire:model="code" required class="form-control">
        @if($errors->has('code'))
            <p style="color:red">{{$errors->first('code')}}</p>
        @endif
        <label class="control-label">Tarification</label>
        <input type="text" wire:model="libelle" required class="form-control">
        @if($errors->has('libelle'))
            <p style="color:red">{{$errors->first('libelle')}}</p>
        @endif <br>
        <label class="control-label">Valeur</label>
        <input type="text" wire:model="valeur" required class="form-control">
        @if($errors->has('valeur'))
            <p style="color:red">{{$errors->first('valeur')}}</p>
        @endif <br>
        <div class="form-label">Codification</div>
        <input type="checkbox" wire:model="option_tarification" required class="switch-input" checked="false">
        @if($errors->has('option_tarification'))
            <p style="color:red">{{$errors->first('option_tarification')}}</p>
        @endif <br>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>