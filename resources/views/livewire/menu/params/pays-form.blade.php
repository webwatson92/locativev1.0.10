<div>
    {{-- selected : {{ $modelId }} --}}
    <br>
    <form wire:submit.prevent="save">
        <label class="control-label">Code du pays</label>
        <input type="text" wire:model="code_pays" required class="form-control">
        @if($errors->has('code_pays'))
            <p style="color:red">{{$errors->first('code_pays')}}</p>
        @endif
        <label class="control-label">Libelle</label>
        <input type="text" wire:model="libelle" required class="form-control">
        @if($errors->has('libelle'))
            <p style="color:red">{{$errors->first('libelle')}}</p>
        @endif <br>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>