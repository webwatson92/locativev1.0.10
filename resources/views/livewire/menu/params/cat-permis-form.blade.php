<div>
    {{-- selected : {{ $modelId }} --}}
    <br>
    <form wire:submit.prevent="save">
        <label class="control-label">Code du pays</label>
        <input type="text" wire:model="code" required class="form-control">
        @if($errors->has('code'))
            <p style="color:red">{{$errors->first('code')}}</p>
        @endif
        <label class="control-label">Libelle</label>
        <input type="text" wire:model="libelle" required class="form-control">
        @if($errors->has('libelle'))
            <p style="color:red">{{$errors->first('libelle')}}</p>
        @endif <br>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>