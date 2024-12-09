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
        <h5 class="">Relato Geral</h5>

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

        @foreach($custom_fields as $field)



        <x-input label="{{$field->name}}" name="{{$field->name}}" placeholder="{{$field->name}}"
          wire:model.live="custom_fields_values.{{$field->id}}" />

        @endforeach

        <div class="d-flex justify-content-between">
          <button type="button" class="btn btn-secondary" wire:click="previousStep">Anterior</button>
          <button type="button" class="btn btn-primary" wire:click="nextStep">Próxima</button>
        </div>

      </div>



    </div>

    <div style="display: @if($step == 4) inherit  @else none @endif">

      <div class="bs-stepper-content d-grid gap-3 p-8">
        {{-- relato geral --}}
        <h5 class="">Revisão</h5>

        <div class="d-grid gap-3 p-2">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td>Nome</td>
                <td>{{$reported_by}}</td>
              </tr>
              <tr>
                <td>Email</td>
                <td>{{$email}}</td>
              </tr>
              <tr>
                <td>Telefone</td>
                <td>{{$contact}}</td>
              </tr>
              <tr>
                <td>Relato</td>
                <td>{!!$details!!}</td>
              </tr>
              @foreach($custom_fields as $field)
              <tr>
                <td>{{$field->name}}</td>
                <td>{{$custom_fields_values[$field->id] ?? ''}}</td>
              </tr>
              @endforeach
            </tbody>

          </table>

        </div>

        <div class="d-flex justify-content-between">
          <button type="button" class="btn btn-secondary" wire:click="previousStep">Anterior</button>
          <button type="button" class="btn btn-primary" wire:click="nextStep">Confirmar</button>
        </div>

      </div>



    </div>


  </div>

</div>