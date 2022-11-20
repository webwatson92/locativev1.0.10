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
                                    <label for="date_acquisition">Date d'acquisition *</label>
                                    <input type="date" required="required" class="form-control" wire:model="date_acquisition"> 
                                    <span class="text-danger">@error('date_acquisition'){{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="date_cession">Date cession*</label>
                                    <input type="date" required="required" class="form-control" wire:model="date_cession"> 
                                    <span class="text-danger">@error('date_cession'){{$message}} @enderror</span>
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
                                    <label for="valeur">Valeur*</label>
                                    <input type="texte" required="required" class="form-control" wire:model="valeur" placeholder="valeur du véhicule (0.0)"> 
                                    <span class="text-danger">@error('valeur'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="puissance">Puissance*</label>
                                    <input type="texte" required="required" class="form-control" wire:model="puissance" placeholder="Puissance"> 
                                    <span class="text-danger">@error('puissance'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="type_vehicule_id">Type de véhicule *</label>
                                    <select class="form-control" id="type_vehicule_id" wire:model="type_vehicule_id">
                                        <option>Selectionner un type de véhicule</option>
                                        @foreach ($tv as $tvh)
                                            <option value="{{ $tvh->id }}">{{ $tvh->libelle }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('type_vehicule_id'){{$message}} @enderror</span>
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
                                    <label for="type_energie_id">Type d'énergie' *</label>
                                    <select class="form-control" id="type_energie_id" wire:model="type_energie_id">
                                        <option>Selectionner le type d'énergie</option>
                                        @foreach ($te as $ten)
                                            <option value="{{ $ten->id }}">{{ $ten->libelle }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('type_energie_id'){{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="boite_vitesse_id">Boite vitesse *</label>
                                    <select class="form-control" id="boite_vitesse_id" wire:model="boite_vitesse_id">
                                        <option>Selectionner une boite à vitesse</option>
                                        @foreach ($bv as $b)
                                            <option value="{{ $b->id }}">{{ $b->libelle }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('boite_vitesse_id'){{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="societe_id">Société *</label>
                                        <select class="form-control" id="societe_id" wire:model="societe_id">
                                            <option>Selectionner une societe</option>
                                            @foreach ($societe as $s)
                                                <option value="{{ $s->id }}">{{ $s->libelle }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">@error('societe_id'){{$message}} @enderror</span>
                                    </div>
                                </div>
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
                             <div class="col-sm-12">  
                                 <div class="form-group">
                                     <label for="kmc">Dernier kilométrage après visite*</label>
                                     <input type="texte" required="required" class="form-control" wire:model="kmc" placeholder="kmc"> 
                                     <span class="text-danger">@error('kmc'){{$message}} @enderror</span>
                                 </div>
                                 <div class="form-group">
                                    <label for="dkmc">Date du dernier control*</label>
                                    <input type="date" required="required" class="form-control" wire:model="dkmc"> 
                                    <span class="text-danger">@error('dkmc'){{$message}} @enderror</span>
                                 </div>
                                 <div class="form-group">
                                     <div class="form-group">
                                        <label for="pvd">Kilométrage pour prochain control*</label>
                                        <input type="texte" required="required" class="form-control" wire:model="pvd" placeholder="pvd"> 
                                        <span class="text-danger">@error('pvd'){{$message}} @enderror</span>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="form-group">
                                       <label for="dkmc2">Date Prochaine kilométrage*</label>
                                       <input type="date" required="required" class="form-control" wire:model="dkmc2"> 
                                       <span class="text-danger">@error('dkmc2'){{$message}} @enderror</span>
                                    </div>
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
