<div>
    <div class="row">
        <div class="col-sm-10">
            <h1>Listes des caisses</h1>
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
            <h5 class="modal-title" id="modalFormLabel">Enregistrement d'une caisse</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body"> 
                        @livewire('menu.caisse.caisse-form')
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
            <h5 class="modal-title" id="modalFormDeleteLabel">Suppression d'une caisse</h5>
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
        @if($caisse->count())
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Code</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Libéllé</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Période</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Heure</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Valeur</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Solde</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Type. Mouvement</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Client</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fourniture</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Location</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">nature_mvm</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">observation</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Société</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gérant</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Note</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Url</th> 
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
            </tr>
          </thead>
          <tbody> 
            @foreach($caisse as $item)
            <tr>
              <td>
                <p>{{$item->code}}</p>
              </td>
              <td>
                <p>{{$item->libelle}}</p>
              </td>
              <td>
                <p>{{$item->date}}</p>
              </td>
              <td>
                <p>{{$item->periode}}</p>
              </td>
              <td>
                <p>{{$item->heure}}</p>
              </td>
              <td>
                <p>{{$item->valeur}}</p>
              </td>
              <td>
                <p>{{$item->solde}}</p>
              </td>
              <td>
                <p>{{$item->type_mouvement->libelle}}</p>
              </td>
              <td>
                <p>{{$item->client->libelle}}</p>
              </td>
              <td>
                <p>{{$item->fourniture->libelle}}</p>
              </td>
              <td>
                <p>{{$item->location->libelle}}</p>
              </td>
              <td>
                <p>{{$item->nature_mvm}}</p>
              </td>
              <td>
                <p>{{$item->observation}}</p>
              </td>
              <td>
                <p>{{$item->societe->libelle}}</p>
              </td>
              <td>
                <p>{{$item->gerant->libelle}}</p>
              </td>
              <td>
                <p>{{$item->note}}</p>
              </td>
              <td>
                <p><a href="{{$item->url}}">{{$item->url}}</a></p>
              </td>
              <td>
                    <button class="btn bt-sm btn-success" id="modalFormDelete" wire:click="selectItem({{ $item->id }}, 'update')"><i class="fa-solid fa-pencil fa-fw"></i></button>
                    <button class="btn bt-sm btn-danger" id="modalFormDelete" wire:click="selectItem({{ $item->id }}, 'delete')"><i class="fa-solid fa-trash fa-fw"></i></button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{$caisse->links()}}
        @endif
      </div>
    </div>
  </div>