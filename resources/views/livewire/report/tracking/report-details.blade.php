<div class="report-details mt-4">
  <h5 class="mb-4">Detalhes da Denúncia</h5>

  <div class="card bg-light">
      <div class="card-body">
          <!-- Status atual -->
          <div class="d-flex align-items-center mb-4">
              <div class="status-badge me-3">
                  <span class="badge bg-{{ $report->status_color }} p-2">
                      {{ $report->status_description }}
                  </span>
              </div>
              <div class="status-info">
                  <small class="text-muted d-block">Última atualização</small>
                  <strong>{{ $report->updated_at->format('d/m/Y H:i') }}</strong>
              </div>
          </div>

          <!-- Informações básicas -->
          <div class="row g-3 mb-4">
              <div class="col-md-6">
                  <div class="info-item">
                      <small class="text-muted d-block">Protocolo</small>
                      <strong>{{ $report->protocol }}</strong>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="info-item">
                      <small class="text-muted d-block">Data do Registro</small>
                      <strong>{{ $report->created_at->format('d/m/Y H:i') }}</strong>
                  </div>
              </div>
          </div>

          <!-- Timeline de atualizações -->
          {{-- @if($report->updates->isNotEmpty())
              <div class="timeline mt-4">
                  <h6 class="mb-3">Histórico de Atualizações</h6>

                  <div class="timeline-items">
                      @foreach($report->updates as $update)
                          <div class="timeline-item">
                              <div class="timeline-marker"></div>
                              <div class="timeline-content">
                                  <div class="timeline-date text-muted">
                                      {{ $update->created_at->format('d/m/Y H:i') }}
                                  </div>
                                  <div class="timeline-title">
                                      {{ $update->title }}
                                  </div>
                                  <div class="timeline-text">
                                      {{ $update->description }}
                                  </div>
                              </div>
                          </div>
                      @endforeach
                  </div>
              </div>
          @endif --}}
      </div>
  </div>
</div>
