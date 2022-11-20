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
                                    <label for="code">Code </label>
                                    <input required="required" type="text" class="form-control" wire:model="code" placeholder="Code"> 
                                    <span class="text-danger">@error('code'){{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="nom">Nom *</label>
                                    <input type="text" required="required" class="form-control" wire:model="nom" placeholder="nom"> 
                                    <span class="text-danger">@error('nom'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="prenom">Prénom *</label>
                                    <input type="text" required="required" class="form-control" wire:model="prenom" placeholder="Prénom"> 
                                    <span class="text-danger">@error('prenom'){{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" required="required" class="form-control" wire:model="email" placeholder="Email"> 
                                    <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="password">Mot de passe *</label>
                                    <input type="password" required="required" class="form-control" wire:model="password" placeholder="code de sécurité"> 
                                    <span class="text-danger">@error('password'){{$message}} @enderror</span>
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
                                    <label for="sexe">Sexe *</label>
                                    <select class="form-control" id="sexe" wire:model="sexe">
                                        <option value="">Selectionner le sexe</option>
                                        <option value="Homme">Homme</option>
                                        <option value="Femme">Femme</option>
                                    </select>
                                    <span class="text-danger">@error('sexe'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="date_expiration_permis">Date expiration permis *</label>
                                    <input type="date" required="required" class="form-control" wire:model="date_expiration_permis" placeholder="2022/01/01">
                                    <span class="text-danger">@error('date_expiration_permis'){{$message}} @enderror</span>
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
                                <label for="cat_permis_id">Catégorie permis *</label>
                                <select class="form-control" id="cat_permis_id" wire:model="cat_permis_id">
                                    <option value="">Selectionner une catégorie</option>
                                    @foreach ($catpermis as $c)
                                        <option value="{{ $c->id }}">{{ $c->libelle }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('cat_permis_id'){{$message}} @enderror</span>
                            </div>
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
