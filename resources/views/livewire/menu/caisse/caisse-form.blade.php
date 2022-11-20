<div>
    <form wire:submit.prevent="save" autocomplete="on">
        {{-- STEP 1 --}}
        @if($currentStep == 1)
        <div class="step-one">
            <div class="card">
                <div class="card-header bg-secondary text-white">STEP 1/4</div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="code">Code </label>
                                    <input required="required" type="text" class="form-control" wire:model="code" placeholder="Code"> 
                                    <span class="text-danger">@error('code'){{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="libelle">Libéllé *</label>
                                    <input type="text" required="required" class="form-control" wire:model="libelle" placeholder="libelle"> 
                                    <span class="text-danger">@error('libelle'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="date">Date *</label>
                                    <input type="date" required="required" class="form-control" wire:model="date" placeholder="Prénom"> 
                                    <span class="text-danger">@error('date'){{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="periode">Période *</label>
                                    <input type="date" required="required" class="form-control" wire:model="periode" placeholder="periode"> 
                                    <span class="text-danger">@error('periode'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="heure">Heure *</label>
                                    <input type="time" required="required" class="form-control" wire:model="heure"> 
                                    <span class="text-danger">@error('heure'){{$message}} @enderror</span>
                                </div>
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
                <div class="card-header bg-secondary text-white">STEP 2/4 </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="solde">Solde *</label>
                                        <input type="text" required="required" class="form-control" wire:model="solde" placeholder="N° Tel"> 
                                        <span class="text-danger">@error('solde'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="type_mouvement_id">Type de mouvement *</label>
                                        <select class="form-control" id="sexe" wire:model="type_mouvement_id">
                                            <option value="">Selectionner le type de mouvement</option>
                                            @foreach ($tm as $q)
                                                <option value="{{ $q->id }}">{{ $q->libelle }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">@error('type_mouvement_id'){{$message}} @enderror</span>
                                    </div>
                                </div>  
                            </div>
                            
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="client_id">Client *</label>
                                    <select class="form-control" id="client_id" wire:model="client_id">
                                        <option value="">Selectionner un client</option>
                                        @foreach ($client as $cl)
                                            <option value="{{ $cl->id }}">{{ $cl->libelle }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('client_id'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="fourniture_id">Fourniture *</label>
                                    <select class="form-control" id="fourniture_id" wire:model="fourniture_id">
                                        <option value="">Selectionner une fourniture</option>
                                        @foreach ($fourniture as $q)
                                            <option value="{{ $q->id }}">{{ $q->libelle }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('fourniture_id'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="location_id">Location *</label>
                                    <select class="form-control" id="location_id" wire:model="location_id">
                                        <option value="">Selectionner votre location</option>
                                        @foreach ($location as $q)
                                            <option value="{{ $q->id }}">{{ $q->libelle }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('location_id'){{$message}} @enderror</span>
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
                <div class="card-header bg-secondary text-white">STEP 3/4</div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="nature_mvm">Nature du mouvement *</label>
                                        <input type="text" class="form-control" wire:model="nature_mvm" placeholder="Nature du mouvement""> 
                                        <span class="text-danger">@error('nature_mvm'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="observation">Observation *</label>
                                    <input type="text" class="form-control" wire:model="observation" placeholder="Observation""> 
                                    <span class="text-danger">@error('observation'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="societe_id">Société *</label>
                                <select class="form-control" id="societe_id" wire:model="societe_id">
                                    <option value="">Selectionner une société</option>
                                    @foreach ($societe as $soc)
                                        <option value="{{ $soc->id }}">{{ $soc->libelle }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('cat_permis_id'){{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>
            
            </div>
        </div>
        @endif

        {{-- STEP 4 --}}
        @if($currentStep == 4)
        <div class="step-tree">
            <div class="card">
                <div class="card-header bg-secondary text-white">STEP 4/4</div>
                <div class="card-body">
                        <div class="row">
                            <div class="form-group">
                                <label for="gerant_id">Gerant *</label>
                                <select class="form-control" id="gerant_id" wire:model="gerant_id">
                                    <option value="">Selectionner votre choix</option>
                                    @foreach ($gerant as $g)
                                        <option value="{{ $g->id }}">{{ $g->nom }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('gerant_id'){{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="note">Note *</label>
                                    <textarea class="form-control" wire:model="note"></textarea>
                                    <span class="text-danger">@error('note'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="url">url</label>
                                    <input type="url" class="form-control" wire:model="url" placeholder="http:// ou https://""> 
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

            @if($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Précédent</button>
            @endif

            @if($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
                <button type="button" class="btn btn-md btn-info" wire:click="increaseStep()">Suivant</button>
            @endif
            
            @if($currentStep == 4 )
                <button type="submit" class="btn btn-md btn-success">Envoyer</button>
            @endif

        </div>
   </form>
</div>
