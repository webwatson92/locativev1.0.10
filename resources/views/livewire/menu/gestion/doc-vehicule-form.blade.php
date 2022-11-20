<div>
    {{-- selected : {{ $modelId }} --}}
    <br>
    <form wire:submit.prevent="save">
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label" for="code">Code</label>
                <input type="text" class="form-control" id="code" wire:model="code">
                <span class="text-danger">@error('code'){{$message}} @enderror</span>
            </div>
            
            <div class="col-md-6">
                <label class="form-label" for="nomDoc">Nom du document</label>
                <input type="text" class="form-control" id="nomDoc" wire:model="libelle" placeholder="Saisissez le document">
                <span class="text-danger">@error('libelle'){{$message}} @enderror</span>
            </div>
            
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label" for="datePkm">Date d'établissement</label>
                <input type="date" class="form-control" id="datePkm" wire:model="date_etablissement">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="dateValid">Date validation</label>
                <input type="date" class="form-control" id="dateValid" wire:model="date_validation" placeholder="Saisissez la date de validation">
                <span class="text-danger">@error('date_validation'){{$message}} @enderror</span>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label" for="valeur">Valeur</label>
                <input type="text" class="form-control" id="puissance" wire:model="valeur" placeholder="Saisissez la valeur">
                <span class="text-danger">@error('valeur'){{$message}} @enderror</span>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="dateFin">Date Fin</label>
                <input type="date" class="form-control" id="dateFin" wire:model="date_fin" placeholder="Saisissez la date fin">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label" for="societe">Société</label>
                <select class="form-control" id="societe_id" wire:model="societe_id">
                    <option value="">Selectionner votre choix</option>
                    @foreach ($societe as $g)
                        <option value="{{ $g->id }}">{{ $g->libelle }}</option>
                    @endforeach
                </select>
                <span class="text-danger">@error('societe'){{$message}} @enderror</span>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="vehicule">Vehicule</label>
                <select class="form-control" id="vehicule_id" wire:model="vehicule_id">
                    <option value="">Selectionner votre choix</option>
                    @foreach ($vehicule as $g)
                        <option value="{{ $g->id }}">{{ $g->libelle }}</option>
                    @endforeach
                </select>
                <span class="text-danger">@error('vehicule'){{$message}} @enderror</span>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12 col-sm-12 col-xs-6 col-lg-12">
                <label class="form-label" for="url">url</label>
                <input type="file" class="form-control bg-light" wire:model="url"> 
                <span class="text-danger">@error('url'){{$message}} @enderror</span>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>