<div>
    <div class="row">
        <div class="col-sm-10">
            <h1>Listes des vehicules</h1>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalForm">
                <i class="fa-solid fa-circle-plus fa-beat"></i>
            </button>
            <button class="header_more_tool">
              <a class="btn btn-primary" href="#"> <i class="ti-printer"></i></a>
           </button>
        </div>
    </div>
     <!-- Modal AddForm-->
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Enregistrer un vehicule</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body"> 
                        @livewire('menu.gestion.vehicule-form')
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
            <h5 class="modal-title" id="modalFormDeleteLabel">Supprimer le vehicule</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3>Etes-vous sûr de vouloir supprimer ?</h3>
            </div>
            <a href="{{ route('vehicule.pdf') }}">
              <button type="button" class="btn btn-primary"><i class="ti-printer"></i>
           </a>
        </div>
        </div>
    </div>
    <div>
    <!-- End Modal DeleteForm-->
    <br>
    <div class="white_card_body">
      <div class="QA_table table-responsive ">
        @if($vehicule->count())
        <table class="table pt-0 table-striped table-bordered">
          <thead>
            <tr>
              <th scope="col">Code</th>
              <th scope="col">Libéllé</th>
              <th scope="col">Date d'acquisition</th>
              <th scope="col">Date cession</th>
              <th scope="col">PU</th>
              <th scope="col">Puissance</th> 
              <th scope="col">Type véhicule</th> 
              <th scope="col">Type énergie</th> 
              <th scope="col">Boite vitesse</th> 
              <th scope="col">Société</th> 
              <th scope="col">Gerant</th> 
              <th scope="col">KMC</th> 
              <th scope="col">Date KMC</th>
              <th scope="col">PVD</th>
              <th scope="col">Date KMC 2</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody> 
            @foreach($vehicule as $item)
            <tr>
              <td  class="nowrap">{{$item->code}}</td>
              <td  class="nowrap">{{$item->libelle}}</td>
              <td  class="nowrap">{{$item->date_acquisition}}</td>
              <td  class="nowrap">{{$item->date_cession}}</td>
              <td  class="nowrap">{{$item->valeur}} Fcfa</td>
              <td  class="nowrap">{{$item->puissance}} W</td>
              <td  class="nowrap">{{$item->type_vehicule->libelle}}</td>
              <td  class="nowrap">{{$item->type_energie->libelle}}</td>
              <td  class="nowrap">{{$item->boite_vitesse->libelle}}</td>
              <td  class="nowrap">{{$item->societe->libelle}}</td>
              <td  class="nowrap">{{$item->user->name}}</td>
              <td  class="nowrap">{{$item->kmc}} KM</td>
              <td  class="nowrap">{{$item->dkmc}}</td>
              <td  class="nowrap">{{$item->pvd}} KM</td>
              <td  class="nowrap">{{$item->dkmc2}}</td>
              <td class="nowrap">
                <a href="#" id="modalFormDelete" wire:click="selectItem({{ $item->id }}, 'update')"> <i class="fas fa-edit"></i> </a> &nbsp;
                <a href="#" id="modalFormDelete" wire:click="selectItem({{ $item->id }}, 'delete')"> <i class="ti-trash"></i> </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{$vehicule->links()}}
        @endif
      </div>
    </div>
  </div>