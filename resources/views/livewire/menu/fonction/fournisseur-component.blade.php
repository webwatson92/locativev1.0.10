<div>
    <div class="row">
        <div class="col-sm-10">
            <h1>Listes des fournisseur</h1>
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
            <h5 class="modal-title" id="modalFormLabel">Enregistrer une fournisseur</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body"> 
                        @livewire('menu.fonction.fournisseur-form')
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
            <h5 class="modal-title" id="modalFormDeleteLabel">Supprimer un fournisseur</h5>
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
        @if($fournisseur->count())
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Code</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fournisseur</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Société</th> 
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gérant</th> 
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Reg. Commerce</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">N° Taxe</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">N° Tel</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Adresse</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Quartier</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ville</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pays</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Note</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Url</th> 
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
            </tr>
          </thead>
          <tbody> 
            @foreach($fournisseur as $item)
            <tr>
              <td>
                <p>{{$item->code}}</p>
              </td>
              <td>
                <p>{{$item->libelle}}</p>
              </td>
              <td>
                <p>{{$item->societe->libelle}}</p>
              </td>
              <td>
                <p>{{$item->gerant->nom}}</p>
              </td>
              <td>
                <p>{{$item->reg_commerce}}</p>
              </td>
              <td>
                <p>{{$item->numero_taxe}}</p>
              </td>
              <td>
                <p>{{$item->numero_tel}}</p>
              </td>
              <td>
                <p>{{$item->adresse}}</p>
              </td>
              <td>
                <p>{{$item->email}}</p>
              </td>
              <td>
                <p>{{$item->quartier->libelle}}</p>
              </td>
              <td>
                <p>{{$item->ville->libelle}}</p>
              </td>
              <td>
                <p>{{$item->pays->libelle}}</p>
              </td>
              <td>
                <p>{{$item->note}}</p>
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
        {{$fournisseur->links()}}
        @endif
      </div>
    </div>
  </div>