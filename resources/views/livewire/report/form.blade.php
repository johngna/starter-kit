<div class="card">

  <div class="">

    <div style="display: @if($step == 1) inherit @else none @endif">
      <div class="bs-stepper-content d-grid gap-3 p-8">
        {{-- identificada ou anonima --}}

        <h5 class="">Identificação</h5>
        <div class="">
          <div class="row">
            <div class="col-md mb-md-0 mb-5">
              <div class="form-check custom-option custom-option-basic">
                <label class="form-check-label custom-option-content" for="customRadioTemp1">
                  <input name="customRadioTemp" class="form-check-input" type="radio" value="false"
                    id="customRadioTemp1" wire:model.live="is_anonymous" />
                  <span class="custom-option-header">
                    <span class="h6 mb-0">Identificado</span>
                    {{-- <small class="text-muted">Free</small> --}}
                  </span>
                  <span class="custom-option-body">
                    <small>Denúncia identificada</small>
                  </span>
                </label>
              </div>
            </div>
            <div class="col-md">
              <div class="form-check custom-option custom-option-basic">
                <label class="form-check-label custom-option-content" for="customRadioTemp2">
                  <input name="customRadioTemp" class="form-check-input" type="radio" value="true" id="customRadioTemp2"
                    wire:model.live="is_anonymous" />
                  <span class="custom-option-header">
                    <span class="h6 mb-0">Anônimo</span>
                    {{-- <small class="text-muted">$ 5.00</small> --}}
                  </span>
                  <span class="custom-option-body">
                    <small>Denúncia anônima</small>
                  </span>
                </label>
              </div>
            </div>
          </div>
        </div>


        @if($is_anonymous == 'false')

        <div class="d-grid gap-3 p-2">
          <x-input label="Nome" name="Nome" placeholder="Nome do denunciante" wire:model="reported_by" />
          <div class="row">
            <div class="col-md-6">
              <x-input label="Email" name="Email" type="email" placeholder="Email do denunciante" wire:model="email" />
            </div>
            <div class="col-md-6">
              <x-input label="Telefone" name="Telefone" placeholder="Telefone do denunciante" wire:model="contact" />
            </div>
          </div>
        </div>

        @endif

        {{-- <div class="d-flex justify-content-between"> --}}
          <button type="button" class="btn btn-primary" wire:click="nextStep">Próxima</button>
          {{--
        </div> --}}

      </div>
    </div>


    <div style="display: @if($step == 2) inherit  @else none @endif">
      <div class="bs-stepper-content d-grid gap-3 p-8">
        {{-- relato geral --}}
        <h5 class="" style="margin-bottom: -50px">Relato Geral</h5>

        <x-quill-editor label="" id="editor1" name="details" model="details" placeholder=''
          initialvalue="{!!$details!!}" />


        <div class="d-flex justify-content-between">
          <button type="button" class="btn btn-secondary" wire:click="previousStep">Anterior</button>
          <button type="button" class="btn btn-primary" wire:click="nextStep">Próxima</button>
        </div>

      </div>

    </div>

    <div style="display: @if($step == 3) inherit  @else none @endif">

      <div class="bs-stepper-content d-grid gap-3 p-8">
        {{-- relato geral --}}
        <h5 class="">Informações Complementares</h5>


        <div class="row">
          <div class="col-md-6">
            <x-input label="Local" name="Local" placeholder="Local da denúncia" wire:model="location" />
          </div>
          <div class="col-md-6">
            <x-input label="Data/Hora" name="Data" type="datetime-local" placeholder="Data da denúncia" wire:model="date" />
          </div>
        </div>




        @foreach($custom_fields as $field)

        <x-reports.custom-field label="{{$field->name}}" name="{{$field->name}}" placeholder="{{$field->name}}"
          wire:model.live="custom_fields_values.{{$field->id}}"  :field="$field"
          :value="$custom_fields_values[$field->id] ?? null" />

        @endforeach

        <div class="d-flex justify-content-between">
          <button type="button" class="btn btn-secondary" wire:click="previousStep">Anterior</button>
          <button type="button" class="btn btn-primary" wire:click="nextStep">Próxima</button>
        </div>

      </div>



    </div>

    <div style="display: @if($step == 4) inherit @else none @endif">

          <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">
                      <i data-feather="check-circle" class="me-2"></i>
                      Revisão da Denúncia
                  </h5>
                  {{-- <span class="badge bg-primary">Etapa Final</span> --}}
              </div>

              <div class="card-body">
                  <div class="row">
                      <!-- Coluna Principal -->
                      <div class="col-lg-8">
                          <!-- Seção de Identificação -->
                          <div class="review-section mb-4">
                              <h6 class="fw-bold d-flex align-items-center text-primary mb-3">
                                  <i data-feather="user" class="me-2"></i>
                                  Informações do Denunciante
                              </h6>

                              @if($is_anonymous == 'false')
                                  <div class="table-responsive">
                                      <table class="table table-hover">
                                          <tbody>
                                              <tr>
                                                  <th  class="bg-light" style="width: 30%">Nome:</th>
                                                  <td>{{ $reported_by ?: 'Não informado' }}</td>
                                              </tr>
                                              <tr>
                                                  <th  class="bg-light" style="width: 30%">Email:</th>
                                                  <td>{{ $email ?: 'Não informado' }}</td>
                                              </tr>
                                              <tr>
                                                  <th  class="bg-light" style="width: 30%">Telefone:</th>
                                                  <td>{{ $contact ?: 'Não informado' }}</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              @else
                                  <div class="alert alert-info d-flex align-items-center">
                                      <i data-feather="eye-off" class="me-2"></i>
                                      <span>Esta é uma denúncia anônima</span>
                                  </div>
                              @endif
                          </div>

                          <!-- Seção do Relato -->
                          <div class="review-section mb-4">
                              <h6 class="fw-bold d-flex align-items-center text-primary mb-3">
                                  <i data-feather="file-text" class="me-2"></i>
                                  Relato da Denúncia
                              </h6>

                              <div class="card bg-light-secondary">
                                  <div class="card-body">
                                      <div class="formatted-content">
                                          {!! $details !!}
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <!-- Seção de Informações Complementares -->
                          <div class="review-section mb-4">
                              <h6 class="fw-bold d-flex align-items-center text-primary mb-3">
                                  <i data-feather="list" class="me-2"></i>
                                  Informações Complementares
                              </h6>

                              <div class="table-responsive">
                                  <table class="table table-hover">
                                      <tbody>
                                          @foreach($custom_fields as $field)
                                              <tr>
                                                  <th class="bg-light" style="width: 30%">
                                                      {{ $field->name }}
                                                  </th>
                                                  <td>
                                                      {{ $custom_fields_values[$field->id] ?? 'Não informado' }}
                                                  </td>
                                              </tr>
                                          @endforeach
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>

                      <!-- Coluna Lateral -->
                      <div class="col-lg-4">
                          <div class="card bg-light-primary">
                              <div class="card-body">
                                  <h6 class="fw-bold mb-3">
                                      <i data-feather="info" class="me-2"></i>
                                      Resumo da Denúncia
                                  </h6>

                                  <ul class="list-unstyled mb-3">
                                      <li class="mb-2 d-flex align-items-center">
                                          <i data-feather="calendar" class="me-2"></i>
                                          <span>{{ now()->format('d/m/Y H:i') }}</span>
                                      </li>
                                      <li class="mb-2 d-flex align-items-center">
                                          <i data-feather="shield" class="me-2"></i>
                                          <span>{{ $is_anonymous == 'true' ? 'Denúncia Anônima' : 'Denúncia Identificada' }}</span>
                                      </li>
                                  </ul>

                                  <div class="alert alert-warning mb-0">
                                      <div class="d-flex">
                                          <i data-feather="alert-circle" class="me-2"></i>
                                          <small>
                                              Revise cuidadosamente todas as informações antes de enviar.
                                              Após o envio, não será possível fazer alterações.
                                          </small>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                  <!-- Seção de Confirmação -->
                  <div class="mt-4">

                      <div class="d-flex justify-content-between">
                          <button type="button" class="btn btn-outline-secondary d-flex align-items-center" wire:click="previousStep">
                              <i data-feather="arrow-left" class="me-2"></i>
                              Voltar e Revisar
                          </button>

                          <button type="button"
                                  class="btn btn-primary d-flex align-items-center"
                                  wire:click="nextStep"
                                  @if(!$confirmed) disabled @endif>
                              Confirmar e Enviar
                              <i data-feather="check" class="ms-2"></i>
                          </button>
                      </div>
                  </div>
              </div>
          </div>

  </div>



  </div>




</div>
