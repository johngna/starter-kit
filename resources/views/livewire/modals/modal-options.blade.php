<div class="modal fade" id="selectModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
  <div class="modal-dialog modal-lg modal-simple modal-enable-otp modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-6">
          <h4 class="mb-2">Adicionar Opções</h4>
          <p class="d-flex justify-content-between"><input type="text" class="form-control" id="basic-default-name" placeholder="Valor"
              wire:model='option' />
            <button class="btn btn-primary" wire:click="addOption">Adicionar</button>
          </p>
        </div>


            @foreach($options as $key => $option)
              <p class="d-flex justify-content-between">
              {{ $option }}
              <span class="text-danger" wire:click='removeOption({{$key}})'> x </span>
              </p>
            @endforeach

      </div>

      <button class="btn btn-primary" wire:click="SaveOption">Salvar</button>


    </div>
  </div>



  <script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('saveOptions', (event) => {
          var values = JSON.stringify(event[0].values);
          var name = event[0].name;

          var input = document.getElementById('input-options');
          input.value = values;

        });
    });
  </script>

</div>

