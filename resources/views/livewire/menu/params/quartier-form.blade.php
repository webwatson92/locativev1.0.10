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
        <label class="control-label">Ville</label>
        <select class="form-control input-md" wire:model="ville_id">
               <option value="">Choisissez une ville</option>
               @foreach($ville as $v)
                <option value="{{ $v->id }}">{{ $v->libelle }}</option>
               @endforeach
        </select>
        @if($errors->has('ville_id'))
            <p style="color:red">{{$errors->first('ville_id')}}</p>
        @endif <br>
        <label class="control-label">Pays</label>
        <select class="form-control input-md" wire:model="pays_id">
               <option value="">Choisissez un pays</option>
               @foreach($pays as $p)
                <option value="{{ $p->id }}">{{ $p->libelle }}</option>
               @endforeach
        </select>
        @if($errors->has('pays_id'))
            <p style="color:red">{{$errors->first('pays_id')}}</p>
        @endif <br>
        <button type="submit" class="btn btn-primary">Engistrer</button>
    </form>
</div>
