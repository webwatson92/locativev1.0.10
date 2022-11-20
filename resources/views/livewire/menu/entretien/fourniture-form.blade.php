<div>
    <form wire:submit.prevent="save" autocomplete="on">
        {{-- STEP 1 --}}
        @if($currentStep == 1)
        <div class="step-one">
            <div class="card">
                <div class="card-header bg-secondary text-white">STEP 1/3</div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="code">Code *</label>
                                    <input required="required" type="text" class="form-control" wire:model="code" placeholder="Code"> 
                                    <span class="text-danger">@error('code'){{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="date">Date *</label>
                                    <input type="date" required="required" class="form-control" wire:model="date"> 
                                    <span class="text-danger">@error('date'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="periode">Période *</label>
                                    <input type="date" required="required" class="form-control" wire:model="periode"> 
                                    <span class="text-danger">@error('periode'){{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="piece">Pièce*</label>
                                    <select class="form-control" id="piece_id" wire:model="piece_id">
                                        <option>Selectionner une pièce</option>
                                        @foreach ($piece as $q)
                                            <option value="{{ $q->id }}">{{ $q->libelle }}</option>
                                        @endforeach
                                    </select> 
                                    <span class="text-danger">@error('piece_id'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fourniture">Type fourniture*</label>
                                <select class="form-control" id="type_fourniture_id" wire:model="type_fourniture_id">
                                    <option>Selectionner un type de fourniture</option>
                                    @foreach ($tf as $q)
                                        <option value="{{ $q->id }}">{{ $q->libelle }}</option>
                                    @endforeach
                                </select> 
                                <span class="text-danger">@error('type_fourniture_id'){{$message}} @enderror</span>
                            </div>

                        </div>
                    </div>
            
            </div>
        </div>
        @endif

         {{-- STEP 2 --}}
        @if($currentStep == 2)
        <div class="step-two">
            <div class="card">
                <div class="card-header bg-secondary text-white">STEP 2/3 </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="libelle">Libelle *</label>
                                        <input type="text" required="required" class="form-control" wire:model="libelle" placeholder="Libéllé"> 
                                        <span class="text-danger">@error('libelle'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="pu">PU *</label>
                                        <input type="text" required="required" class="form-control" wire:model="pu" placeholder="Prix unitaire"> 
                                        <span class="text-danger">@error('pu'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="qte">Qte *</label>
                                    <input type="number" class="form-control" wire:model="qte" placeholder="Qte"> 
                                    <span class="text-danger">@error('qte'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="societe_id">Société *</label>
                                    <select class="form-control" id="societe_id" wire:model="societe_id">
                                        <option>Selectionner la societe</option>
                                        @foreach ($societe as $q)
                                            <option value="{{ $q->id }}">{{ $q->libelle }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('societe_id'){{$message}} @enderror</span>
                                </div>
                            </div>

                        </div>
                    </div>
            
            </div>
        </div>
        @endif
        
        {{-- STEP 3 --}}
        @if($currentStep == 3)
        <div class="step-tree">
            <div class="card">
                <div class="card-header bg-secondary text-white">STEP 3/3</div>
                <div class="card-body">
                        <div class="row">
                            {{-- <div class="form-group">
                                <label for="gerant_id">Gérant *</label>
                                <select class="form-control" id="gerant_id" wire:model="gerant_id">
                                    <option>Selectionner votre choix</option>
                                    @foreach ($gerant as $g)
                                        <option value="{{ $g->id }}">{{ $g->nom }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('gerant_id'){{$message}} @enderror</span>
                            </div> --}}
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="note">Note *</label>
                                    <textarea class="form-control" wire:model="note"></textarea>
                                    <span class="text-danger">@error('note'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="url">Importer des documents</label>
                                    <input type="file" class="form-control bg-light" wire:model="url"> 
                                    <span class="text-danger">@error('url'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                    </div>
            
            </div>
        </div>
        @endif
        <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">
        
            @if($currentStep == 1)
                <div></div>
            @endif

            @if($currentStep == 2 || $currentStep == 3)
                <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Précédent</button>
            @endif

            @if($currentStep == 1 || $currentStep == 2)
                <button type="button" class="btn btn-md btn-info" wire:click="increaseStep()">Suivant</button>
            @endif
            
            @if($currentStep == 3     )
                <button type="submit" class="btn btn-md btn-success">Envoyer</button>
            @endif

        </div>
   </form>
</div>
