<div>
    <div class="row">
        <div class="col-sm-10">
            <h1>Listes des services</h1>
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
            <h5 class="modal-title" id="modalFormLabel">Enregistrer un service</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @livewire('menu.entretien.service-form')
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
            <h5 class="modal-title" id="modalFormDeleteLabel">Supprimer un piece</h5>
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
        @if($service->count())
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Code</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Période</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Type de service</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Libelle</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">PU</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Qte</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Société</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gérant</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">note</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Url</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
            </tr>
          </thead>
          <tbody> 
            @foreach($service as $item)
            <tr>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{$item->code}}</p>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{$item->date}}</p>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{$item->periode}}</p>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{$item->type_service->libelle}}</p>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{$item->libelle}}</p>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{$item->pu}}</p>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{$item->qte}}</p>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{$item->societe->libelle}}</p>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{$item->gerant->nom}}</p>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{$item->note}}</p>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{$item->url}}</p>
              </td>
              <td>
                    <button class="btn btn-success" id="modalFormDelete" wire:click="selectItem({{ $item->id }}, 'update')"><i class="fa-solid fa-pencil fa-fw"></i></button>
                    <button class="btn btn-danger" id="modalFormDelete" wire:click="selectItem({{ $item->id }}, 'delete')"><i class="fa-solid fa-trash fa-fw"></i></button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{$service->links()}}
        @endif
      </div>
    </div>
  </div>