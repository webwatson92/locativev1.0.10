<div>
    <div class="row">
        <div class="col-sm-10">
            <h1>Listes des documents par véhicule</h1>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalForm">
                <i class="fa-solid fa-circle-plus fa-beat"></i>
            </button>
            <a href="{{ route('dv.pdf') }}">
              <button type="button" class="btn btn-primary"><i class="ti-printer"></i>
           </a>
        </div>
    </div>
     <!-- Modal AddForm-->
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Enregistrer un document du véhicule</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body"> 
                        @livewire('menu.gestion.doc-vehicule-form')
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
        <div clas s="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalFormDeleteLabel">Supprimer le document du vehicule</h5>
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
    <div class="white_card_body">
      <div class="QA_table table-responsive ">
        @if($docVehicule->count())
        <table class="table pt-0 table-striped table-bordered">
          <thead>
            <tr>
              <th scope="col">Code</th> 
              <th scope="col">Nom du document</th>
              <th scope="col">Date d'établissement</th>
              <th scope="col">Date validation</th>
              <th scope="col">Valeur (PU)</th>
              <th scope="col">Date fin</th>
              <th scope="col">Société</th> 
              <th scope="col">Véhicule</th> 
              <th scope="col">Gerant</th> 
              <th scope="col">Document</th> 
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody> 
            @foreach($docVehicule as $item)
            <tr>
              <td  class="nowrap">{{$item->code}}</td>
              <td  class="nowrap">{{$item->libelle}}</td>
              <td  class="nowrap">{{$item->date_etablissement}}</td>
              <td  class="nowrap">{{$item->date_validation}}</td>
              <td  class="nowrap">{{$item->valeur}} Fcfa</td>
              <td  class="nowrap">{{$item->date_fin}}</td>
              <td  class="nowrap">{{$item->societe->libelle}}</td>
              <td  class="nowrap">{{$item->vehicule->libelle}}</td>
              <td  class="nowrap">{{$item->user->name}}</td>
              <td  class="nowrap"><a href="{{ asset('documents') }}/{{ $item->url }}" target="_blank">Télécharger</a></td>

              <td class="nowrap">
                <a href="#" id="modalFormDelete" wire:click="selectItem({{ $item->id }}, 'update')"> <i class="fas fa-edit"></i> </a> &nbsp;
                <a href="#" id="modalFormDelete" wire:click="selectItem({{ $item->id }}, 'delete')"> <i class="ti-trash"></i> </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{$docVehicule->links()}}
        @endif
      </div>
    </div>
  </div>