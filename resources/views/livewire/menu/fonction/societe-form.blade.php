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
                                    <label for="libelle">Libéllé *</label>
                                    <input type="text" required="required" class="form-control" wire:model="libelle" placeholder="Libelle"> 
                                    <span class="text-danger">@error('libelle'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lastname">Reg. Commerce *</label>
                                    <input type="text" required="required" class="form-control" wire:model="reg_commerce" placeholder="Registre de commerce"> 
                                    <span class="text-danger">@error('reg_commerce'){{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="numero_taxe">Numéro taxe *</label>
                                    <input type="text" required="required" class="form-control" wire:model="numero_taxe" placeholder="N° Taxe"> 
                                    <span class="text-danger">@error('numero_taxe'){{$message}} @enderror</span>
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
                <div class="card-header bg-secondary text-white">STEP 2/3 </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="numero_tel">Numéro tel *</label>
                                        <input type="text" required="required" class="form-control" wire:model="numero_tel" placeholder="N° Tel"> 
                                        <span class="text-danger">@error('numero_tel'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="adresse">Adresse *</label>
                                        <input type="text" required="required" class="form-control" wire:model="adresse" placeholder="Votre adresse"> 
                                        <span class="text-danger">@error('adresse'){{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" wire:model="email" placeholder="Email de la société"> 
                                    <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="quartier_id">Quartier *</label>
                                    <select class="form-control" id="quartier_id" wire:model="quartier_id">
                                        <option value="">Selectionner le quartier</option>
                                        @foreach ($quartier as $q)
                                            <option value="{{ $q->id }}">{{ $q->libelle }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('quartier_id'){{$message}} @enderror</span>
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
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="ville_id">Ville *</label>
                                        <select class="form-control" id="ville_id" wire:model="ville_id">
                                            <option value="">Selectionner la ville</option>
                                            @foreach ($ville as $v)
                                                <option value="{{ $v->id }}">{{ $v->libelle }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">@error('ville_id'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pays_id">Pays *</label>
                                <select class="form-control" id="pays_id" wire:model="pays_id">
                                    <option value="">Selectionner votre choix</option>
                                    @foreach ($pays as $p)
                                        <option value="{{ $p->id }}">{{ $p->libelle }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('pays_id'){{$message}} @enderror</span>
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
