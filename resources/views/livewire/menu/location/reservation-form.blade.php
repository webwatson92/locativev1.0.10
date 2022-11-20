<div>
    {{-- selected : {{ $modelId }} --}}
    <br>
    <form wire:submit.prevent="save">
        <label class="control-label">Code</label>
        <input type="text" wire:model="code" required class="form-control">
        @if($errors->has('code'))
            <p style="color:red">{{$errors->first('code')}}</p>
        @endif
        <label class="control-label">Reservation</label>
        <input type="text" wire:model="libelle" required class="form-control">
        @if($errors->has('libelle'))
            <p style="color:red">{{$errors->first('libelle')}}</p>
        @endif <br>
        <label class="control-label">Reservation</label>
        <select class="form-control" id="statut_reservation" wire:model="statut_reservation">
            <option>Selectionner un type</option>
            <option value="Actif">Actif</option>
            <option value="En attente">En attente</option>
        </select>        
        @if($errors->has('statut_reservation'))
            <p style="color:red">{{$errors->first('statut_reservation')}}</p>
        @endif <br>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>