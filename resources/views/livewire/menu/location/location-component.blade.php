<div>
    <div class="row">
        <div class="col-sm-10">
            <h1>Listes des locations</h1>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalForm">
                <i class="fa-solid fa-circle-plus fa-beat"></i>
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalForm">
                Imprimer
            </button>
        </div>
    </div>
     <!-- Modal AddForm-->
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Enregistrer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body"> 
                        @livewire('menu.location.location-form')
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
        </div>
    </div>
    <!-- End Modal AddForm-->
    <div>
     <!-- Modal DeleteForm-->
    <div class="modal fade" id="modalFormDelete" tabindex="-1" aria-labelledby="modalFormDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalFormDeleteLabel">Supprimer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3>Etes-vous sûr de vouloir supprimer ?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Non</button>
                <button wire:click="delete" class="btn btn-primary" data-bs-dismiss="modal">Oui</button>
            </div>
        </div>
        </div>
    </div>
    <div>
    <!-- End Modal DeleteForm-->
    <br>
    <div class="card-body px-0 pb-2">
      <div class="table-responsive p-0">
        @if($location->count())
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Client</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Véhicule</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Début</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fin</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">PU Jour</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Qte</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Prix Total</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Montant du</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Reste à payer</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tarification</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Société</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Reservation</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Statut</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Doc</th> 
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
            </tr>
          </thead>
          <tbody> 
            @foreach($location as $item)
            <tr>
              <td>
                <p>{{$item->client->libelle}}</p>
              </td>
              <td>
                <p>{{$item->vehicule->libelle}}</p>
              </td>
              <td>
                <p>{{$item->date_debut}}</p>
              </td>
              <td>
                <p>{{$item->date_fin}}</p>
              </td>
              <td>
                <p>{{$item->pu_journalier}}</p>
              </td>
              <td>
                <p>{{$item->qte}}</p>
              </td>
              <td>
                <p>{{$item->prix_total}}</p>
              </td>
              <td>
                <p>{{$item->va_payer}}</p>
              </td>
              <td>
                <p>{{$item->va_rester_a_payer}}</p>
              </td>
              <td>
                <p>{{$item->tarification->libelle}}</p>
              </td>
              <td>
                <p>{{$item->societe->libelle}}</p>
              </td>
              <td>
                <p>{{$item->reservation->libelle}}</p>
              </td>
              <td>
                <p>{{$item->statut_reservation == 1 ? "Actif" : "Pas actif" }}</p>
              </td>
              <td>
                <p><a href="{{ asset('documents') }}/{{ $item->url }}" target="_blank">Télécharger</a></p>
              </td>
              <td>
                    <button class="btn bt-sm btn-success" id="modalFormDelete" wire:click="selectItem({{ $item->id }}, 'update')"><i class="fa-solid fa-pencil fa-fw"></i></button>
                    <button class="btn bt-sm btn-danger" id="modalFormDelete" wire:click="selectItem({{ $item->id }}, 'delete')"><i class="fa-solid fa-trash fa-fw"></i></button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{$location->links()}}
        @endif
      </div>
    </div>
  </div>