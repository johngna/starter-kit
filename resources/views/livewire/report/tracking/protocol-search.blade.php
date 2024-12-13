<div class="card">
  <div class="card-header">
      <h4 class="card-title">Consulta de Protocolo</h4>
  </div>
  <div class="card-body">
      @if (session()->has('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
      @endif

      <form wire:submit.prevent="search">
          <div class="row g-3">
              <div class="col-12">
                  <div class="form-group">
                      <label for="protocol" class="form-label">Número do Protocolo</label>
                      <input type="text"
                             class="form-control @error('protocol') is-invalid @enderror"
                             id="protocol"
                             wire:model="protocol"
                             placeholder="Digite o protocolo">
                      @error('protocol')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
              </div>

              <div class="col-12">
                  <div class="alert alert-info">
                      <i class="fas fa-info-circle me-2"></i>
                      Se sua denúncia foi registrada como identificada, informe o e-mail cadastrado abaixo.
                      Caso tenha sido uma denúncia anônima, deixe o campo de e-mail em branco.
                  </div>
              </div>

              <div class="col-12">
                  <div class="form-group">
                      <label for="email" class="form-label">E-mail (apenas para denúncias identificadas)</label>
                      <input type="email"
                             class="form-control @error('email') is-invalid @enderror"
                             id="email"
                             wire:model="email"
                             placeholder="Digite seu e-mail (opcional para denúncias anônimas)">
                      @error('email')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
              </div>
          </div>

          <div class="d-flex justify-content-between mt-3">
              <button type="button"
                      class="btn btn-secondary"
                      wire:click="resetSearch">
                  Limpar
              </button>
              <button type="submit"
                      class="btn btn-primary"
                      wire:loading.attr="disabled">
                  <span wire:loading wire:target="search">
                      <i class="fas fa-spinner fa-spin me-1"></i>
                  </span>
                  Consultar
              </button>
          </div>
      </form>

      @if($searchPerformed && $report)
          @include('livewire.report.tracking.report-details', ['report' => $report])
      @endif
  </div>
</div>
