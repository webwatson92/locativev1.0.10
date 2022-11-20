<div>
    {{-- selected : {{ $modelId }} --}}
    <br>
    <form wire:submit.prevent="save">
        <label class="control-label">Code</label>
        <input type="text" wire:model="code" required class="form-control">
        @if($errors->has('code'))
            <p style="color:red">{{$errors->first('code')}}</p>
        @endif
        <label class="control-label">Type de mouvement</label>
        <input type="text" wire:model="libelle" required class="form-control">
        @if($errors->has('libelle'))
            <p style="color:red">{{$errors->first('libelle')}}</p>
        @endif <br>
        <label class="control-label">Nature du mouvement</label>
            <span class="minus">-</span>
            <input type="text" wire:model="nature_mvm" value="1"/>
            <span class="plus">+</span>
        @if($errors->has('nature_mvm'))
            <p style="color:red">{{$errors->first('nature_mvm')}}</p>
        @endif <br>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>