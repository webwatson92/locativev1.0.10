<div>
    <div class="row">
        <div class="col-sm-10">
            <h1>Cotable Liste</h1>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalForm">
                <i class="fa-solid fa-circle-plus fa-beat"></i>
            </button>
        </div>
    </div>
     <!-- Modal AddForm-->
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Enregistrer un code formulaire</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @livewire('menu.params.cotable-form')
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
            <h5 class="modal-title" id="modalFormDeleteLabel">Supprimer un pays</h5>
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
        @if($cotable->count())
        <table class="table table-striped">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Formulaire</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Société</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Codification</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Option Codification</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Numero</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
            </tr>
          </thead>
          <tbody> 
            @php $i=1 @endphp
            @foreach($cotable as $item)
            <tr>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{$i++}}</p>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{$item->formulaire}}</p>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{$item->societe->libelle}}</p>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{$item->codification}}</p>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{$item->option_codification ? "Oui" : "Non"}}</p>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{$item->numero}}</p>
              </td>
              <td>
                    <button class="btn btn-primary" id="modalFormDelete" wire:click="selectItem({{ $item->id }}, 'update')"><i class="fa-solid fa-pencil fa-fw"></i></button>
                    <button class="btn btn-danger" id="modalFormDelete" wire:click="selectItem({{ $item->id }}, 'delete')"><i class="fa-solid fa-trash fa-fw"></i></button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{$cotable->links()}}
        @endif
      </div>
    </div>
  </div>