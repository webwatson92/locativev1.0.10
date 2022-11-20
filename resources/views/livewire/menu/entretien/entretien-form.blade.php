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
                                    <label for="date_acquisition">Date d'acquisition *</label>
                                    <input type="date" required="required" class="form-control" wire:model="date_acquisition"> 
                                    <span class="text-danger">@error('date_acquisition'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="date_cession">Date de cession *</label>
                                    <input type="date" required="required" class="form-control" wire:model="date_cession"> 
                                    <span class="text-danger">@error('date_cession'){{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="type_entretien">Type entretien*</label>
                                    <select class="form-control" id="type_entretien_id" wire:model="type_entretien_id">
                                        <option>Selectionner un type</option>
                                        @foreach ($ten as $q)
                                            <option value="{{ $q->id }}">{{ $q->libelle }}</option>
                                        @endforeach
                                    </select> 
                                    <span class="text-danger">@error('type_entretien_id'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="libelle">Libéllé *</label>
                                <input type="text" required="required" class="form-control" wire:model="libelle"> 
                                <span class="text-danger">@error('libelle'){{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="kilometrage">Kilometrage *</label>
                                <input type="number" required="required" class="form-control" wire:model="kilometrage"> 
                                <span class="text-danger">@error('kilometrage'){{$message}} @enderror</span>
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
                                        <label for="kilometrage_p_v">Kilometrage_p_v *</label>
                                        <input type="number" required="required" class="form-control" wire:model="kilometrage_p_v" placeholder="km"> 
                                        <span class="text-danger">@error('kilometrage_p_v'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="service">Service *</label>
                                        <select class="form-control" id="service_id" wire:model="service_id">
                                            <option>Selectionner un service</option>
                                            @foreach ($service as $q)
                                                <option value="{{ $q->id }}">{{ $q->libelle }}</option>
                                            @endforeach
                                        </select>                                        
                                        <span class="text-danger">@error('service_id'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="valeur_service">Valeur du service *</label>
                                    <input type="number" class="form-control" wire:model="valeur_service" placeholder="valeur service"> 
                                    <span class="text-danger">@error('valeur_service'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="valeur_fourniture">Valeur de fourniture *</label>
                                    <input type="number" class="form-control" wire:model="valeur_fourniture" placeholder="valeur fourniture"> 
                                    <span class="text-danger">@error('valeur_fourniture'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="valeur_total">Valeur de total *</label>
                                    <input type="number" class="form-control" wire:model="valeur_total" placeholder="valeur total"> 
                                    <span class="text-danger">@error('valeur_total'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="fourniture_id">Fourniture *</label>
                                    <select class="form-control" id="fourniture_id" wire:model="fourniture_id">
                                        <option>Selectionner la fourniture</option>
                                        @foreach ($fourniture as $q)
                                            <option value="{{ $q->id }}">{{ $q->libelle }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('fourniture_id'){{$message}} @enderror</span>
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
                            <div class="form-group">
                                <label for="vehicule_id">Véhicule *</label>
                                <select class="form-control" id="vehicule_id" wire:model="vehicule_id">
                                    <option>Selectionner votre choix</option>
                                    @foreach ($vehicule as $g)
                                        <option value="{{ $g->id }}">{{ $g->libelle }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('vehicule_id'){{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="societe_id">Société *</label>
                                <select class="form-control" id="societe_id" wire:model="societe_id">
                                    <option>Selectionner votre choix</option>
                                    @foreach ($societe as $g)
                                        <option value="{{ $g->id }}">{{ $g->libelle }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('societe_id'){{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="gerant_id">Gérant *</label>
                                <select class="form-control" id="gerant_id" wire:model="gerant_id">
                                    <option>Selectionner votre choix</option>
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
