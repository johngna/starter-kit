<div>
  <div class="col-xxl">
    <div class="card mb-6">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Categorias de Denúncias</h5>
      </div>
      <div class="card-body">
        <form wire:submit.prevent="save">
          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Nome</label>
            <div class="col-sm-10">
              <x-input type="text" class="form-control" name="name" wire:model='name' />
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="basic-default-message">Descrição</label>
            <div class="col-sm-10">
              <textarea id="basic-default-message" class="form-control" rows="5" wire:model='description'></textarea>
            </div>
          </div>

          <div class="row mb-6">
            <label for="select2Icons" class="col-sm-2 col-form-label">Icone</label>
            <div class="col-sm-10 d-flex align-items-center">
              <div class="input-group">
                <span class="input-group-text" id="basic-addon11"> <i class="ti ti-{{$icon}}   cursor-pointer"></i>
                </span>
                <input type="text" class="form-control" wire:model='icon' />
              </div>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentProvider">
                Selecionar
              </button>
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  @include('_partials/_modals/modal-select-payment-providers')

</div>
