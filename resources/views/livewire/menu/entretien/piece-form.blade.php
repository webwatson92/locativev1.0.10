<div>
    {{-- selected : {{ $modelId }} --}}
    <br>
    <form wire:submit.prevent="save">
        <label class="control-label">Code</label>
        <input type="text" wire:model="code" required class="form-control">
        @if($errors->has('code'))
            <p style="color:red">{{$errors->first('code')}}</p>
        @endif
        <label class="control-label">Libelle</label>
        <input type="text" wire:model="libelle" required class="form-control">
        @if($errors->has('libelle'))
            <p style="color:red">{{$errors->first('libelle')}}</p>
        @endif <br>
        <label class="control-label">PU</label>
        <input type="text" wire:model="pu" required class="form-control">
        @if($errors->has('pu'))
            <p style="color:red">{{$errors->first('pu')}}</p>
        @endif <br>
        <label class="control-label">Type de pièce</label>
        <select class="form-control" id="type_piece_id" wire:model="type_piece_id">
            <option value="">Selectionner votre choix</option>
            @foreach ($tp as $t)
                <option value="{{ $t->id }}">{{ $t->libelle }}</option>
            @endforeach
        </select>
        @if($errors->has('type_piece_id'))
            <p style="color:red">{{$errors->first('type_piece_id')}}</p>
        @endif <br>
        <label class="control-label">Note</label>
        <input type="text" wire:model="note" required class="form-control">
        @if($errors->has('note'))
            <p style="color:red">{{$errors->first('note')}}</p>
        @endif <br>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>