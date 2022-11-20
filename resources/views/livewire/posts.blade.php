<div>
  <div class="">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalForm">
      <i class="fa-solid fa-circle-plus fa-beat"></i>
    </button>
  </div>
   <!-- Modal AddForm-->
  <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="modalFormLabel">Enregistrer un post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              @livewire('post-form')
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
          <h5 class="modal-title" id="modalFormDeleteLabel">Supprimer un post</h5>
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
      @if($posts->count())
      <table class="table align-items-center mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Titre</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Contenu</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
            <th class="text-secondary opacity-7"></th>
          </tr>
        </thead>
        <tbody> 
          @foreach($posts as $item)
          <tr>
            <td>
              <div class="d-flex px-2 py-1">
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-sm">{{$item->title}}</h6>
                </div>
              </div>
            </td>
            <td>
              <p class="text-xs font-weight-bold mb-0">{{$item->content}}</p>
            </td>
            <td>
              <td>
                  <button class="btn btn-success" id="modalFormDelete" wire:click="selectItem({{ $item->id }}, 'update')"><i class="fa-solid fa-pencil fa-fw"></i></button>
                  <button class="btn btn-danger" id="modalFormDelete" wire:click="selectItem({{ $item->id }}, 'delete')"><i class="fa-solid fa-trash fa-fw"></i></button>
              <td>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$posts->links()}}
      @endif
    </div>
  </div>
</div>