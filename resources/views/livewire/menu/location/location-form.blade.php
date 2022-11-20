<div>
    <form wire:submit.prevent="save"  autocomplete="on">
        @csrf
        {{-- STEP 1 --}}
        @if($currentStep == 1)
        <div class="step-one">
            <div class="card">
                <div class="card-header bg-secondary text-white">STEP 1/4</div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="code">Code *</label>
                                    <input required="required" type="text" class="form-control" wire:model="code" placeholder="Code"> 
                                    <span class="text-danger">@error('code'){{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="client_id">Client *</label>
                                    <select class="form-control" id="client_id" wire:model="client_id">
                                        <option value="">Selectionner le client</option>
                                        @foreach ($client as $q)
                                            <option value="{{ $q->id }}">{{ $q->libelle }}</option>
                                        @endforeach
                                    </select> 
                                    <span class="text-danger">@error('client_id'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="vehicule_id">Véhicule *</label>
                                    <select class="form-control" id="vehicule_id" wire:model="vehicule_id">
                                        <option value="">Selectionner le vehicule</option>
                                        @foreach ($vehicule as $q)
                                            <option value="{{ $q->id }}">{{ $q->libelle }}</option>
                                        @endforeach
                                    </select> 
                                    <span class="text-danger">@error('vehicule_id'){{$message}} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="chauffeur_id">Chauffeur *</label>
                                    <select class="form-control" id="chauffeur_id" wire:model="chauffeur_id">
                                        <option value="">Selectionner le chauffeur</option>
                                        @foreach ($chauffeur as $q)
                                            <option value="{{ $q->id }}">{{ $q->nom }}</option>
                                        @endforeach
                                    </select> 
                                    <span class="text-danger">@error('chauffeur_id'){{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="date_debut">Date début *</label>
                                        <input required="required" type="date" class="form-control" wire:model="date_debut" placeholder="date_debut"> 
                                        <span class="text-danger">@error('date_debut'){{$message}} @enderror</span>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="date_fin">Date fin *</label>
                                    <input required="required" type="date" class="form-control" wire:model="date_fin" placeholder="date_fin"> 
                                    <span class="text-danger">@error('date_fin'){{$message}} @enderror</span>
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
                                        <label for="pu_journalier">PU Journalier *</label>
                                        <input type="number" required="required" class="form-control pu_journalier" wire:model="pu_journalier" placeholder="N° Tel"> 
                                        <span class="text-danger">@error('pu_journalier'){{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="qte">Qte *</label>
                                        <input type="number" required="required" class="form-control qte" wire:model="qte" placeholder="N° Tel"> 
                                        <span class="text-danger">@error('qte'){{$message}} @enderror</span>
                                    </div>
                                {{-- </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="prix_total">prix_total *</label>
                                        <input type="text" required="required" disabled class="form-control prix_total" wire:model="prix_total" placeholder="Votre prix_total"> 
                                        <span class="text-danger">@error('prix_total'){{$message}} @enderror</span>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="va_payer">Montant dû *</label>
                                    <input type="va_payer" class="form-control va_payer" wire:model="va_payer" placeholder="va_payer de la société"> 
                                    <span class="text-danger">@error('va_payer'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="va_rester_a_payer">Montant restant à payer*</label>
                                <input type="va_rester_a_payer" class="form-control" wire:model="va_rester_a_payer" placeholder="va_rester_a_payer de la société"> 
                                <span class="text-danger">@error('va_rester_a_payer'){{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="tarification_id">Tarification *</label>
                                    <select class="form-control" id="tarification_id" wire:model="tarification_id">
                                        <option value="">Selectionner</option>
                                        @foreach ($tarification as $q)
                                            <option value="{{ $q->id }}">{{ $q->libelle }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('tarification_id'){{$message}} @enderror</span>
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
                                    <label for="Option tarification">Option tarif *</label>
                                        <select class="form-control" id="Option tarification" wire:model="option_tarification">
                                            <option value="">Selectionner un choix</option>
                                                <option value="1">Actif</option>
                                                <option value="0">En attend</option>
                                        </select>
                                        <span class="text-danger">@error('option_tarification'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="url">Société</label>
                                    <select class="form-control" id="societe_id" wire:model="societe_id">
                                        <option value="">Selectionner votre choix</option>
                                        @foreach ($societe as $p)
                                            <option value="{{ $p->id }}">{{ $p->libelle }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('societe_id'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="url">Reservation</label>
                                    <select class="form-control" id="reservation_id" wire:model="reservation_id">
                                        <option value="">Selectionner votre choix</option>
                                        @foreach ($reservation as $p)
                                            <option value="{{ $p->id }}">{{ $p->libelle }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('reservation_id'){{$message}} @enderror</span>
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
                                     <label for="statut_reservation">Statut reservation *</label>
                                         <select class="form-control" id="statut_reservation" wire:model="statut_reservation">
                                             <option value="">Selectionner un choix</option>
                                                 <option value="1">Ok</option>
                                                 <option value="0">En attente</option>
                                         </select>
                                         <span class="text-danger">@error('statut_reservation'){{$message}} @enderror</span>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="gerant_id">Gerant *</label>
                                 <select class="form-control" id="gerant_id" wire:model="gerant_id">
                                     <option value="">Selectionner votre choix</option>
                                     @foreach ($gerant as $p)
                                         <option value="{{ $p->id }}">{{ $p->nom }}</option>
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
@section("scripts")
  $(".pu_journalier").change(function() {
    alert( "Handler for .change() called." );
  });

$('.pu_journalier').click(function () {
    var pu = $(".pu_journalier").val();
    var pt = $(".prix_total").val();
    console.log(pu);console.log(pt);
});

@stop
