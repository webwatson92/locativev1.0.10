<div>
    <div class="row">
        <div class="col-sm-10">
            <h1>Listes des clients</h1>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalForm">
                <i class="fa-solid fa-circle-plus fa-beat"></i>
            </button>
            <a href="{{ route('client.pdf') }}">
                <button type="button" class="btn btn-primary"><i class="ti-printer"></i>
            </a>
           </button>
        </div>
    </div>
     <!-- Modal AddForm-->
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalFormLabel">Enregistrer un client</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body"> 
                        @livewire('menu.fonction.client-form')
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
            <h5 class="modal-title" id="modalFormDeleteLabel">Supprimer le client</h5>
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
        @if($user->count())
        <table class="table pt-0 table-striped table-bordered">
          <thead>
            <tr>
              <th class="col">Code</th>
              <th class="col">Client</th>
              <th class="col">Reg. commerce</th>
                <th class="col">N° Taxe</th>
                <th class="col">N° Tel</th>
                    <th class="col">Adresse</th> 
                    <th class="col">Email</th> 
                    <th class="col">Quartier</th> 
                    <th class="col">Ville</th> 
                    <th class="col">Pays</th> 
                    <th class="col">Société</th> 
                    <th class="col">Gerant</th> 
                    <th class="col">Note</th> 
                    <th class="col">Url</th> 
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody> 
            @foreach($user as $u)
               @foreach ($u->clients as $item)
            <tr>
              <td  class="nowrap">{{$item->code}}</td>
              <td  class="nowrap">{{$item->libelle}}</td>
              <td  class="nowrap">{{$item->reg_commerce}}</td>
              <td  class="nowrap">{{$item->numero_tel}}</td>
              <td  class="nowrap">{{$item->numero_taxe}}</td>
              <td  class="nowrap">{{$item->adresse}}</td>
              <td  class="nowrap">{{$item->email}}</td>
              <td  class="nowrap">{{$item->quartier->libelle}}</td>
              <td  class="nowrap">{{$item->ville->libelle}}</td>
              <td  class="nowrap">{{$item->pays->libelle}}</td>
              <td  class="nowrap">{{$item->societe->libelle}}</td>
              <td  class="nowrap">{{$u->name}}</td>
              <td  class="nowrap">{{$item->note}}</td>
              <td  class="nowrap"><a href="{{ asset('documents') }}/{{ $item->url }}" target="_blank">Télécharger</a></td>

              <td class="nowrap">
                <a href="#" id="modalFormDelete" wire:click="selectItem({{ $item->id }}, 'update')"> <i class="fas fa-edit"></i> </a> &nbsp;
                <a href="#" id="modalFormDelete" wire:click="selectItem({{ $item->id }}, 'delete')"> <i class="ti-trash"></i> </a>
              </td>
            </tr>
              @endforeach
            @endforeach
          </tbody>
        </table>
        {{$user->links()}}
        @endif
      </div>
    </div>
  </div>