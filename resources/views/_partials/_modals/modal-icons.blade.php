<div class="modal fade" id="selectIcons" tabindex="-1" aria-hidden="true" wire:ignore.self>
  <div class="modal-dialog modal-lg modal-simple modal-enable-otp modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-6">
          <h4 class="mb-2">Selecione um ícone</h4>
          <p><input type="text" class="form-control" id="basic-default-name" placeholder="Pesquisar"
              wire:model.live='search' /></p>
        </div>

        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between border-bottom py-4 mb-4">
          <div class="d-flex flex-wrap gap-4" style="max-height: 300px; overflow-y: auto;">
            @foreach($icons as $icon)
            <i class="ti ti-{{$icon}} border border-2 p-2 cursor-pointer" title="{{$icon}}"
              wire:click="select_icon('{{$icon}}')" data-bs-dismiss="modal"></i>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
