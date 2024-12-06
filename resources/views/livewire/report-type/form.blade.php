<div>

  <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
      <h4 class="mb-1">{{$reportId ? 'Editar' : 'Novo' }} Tipo de Denúncia</h4>
      <p class="mb-0">{{$reportId ? 'Atualizar dados do' : 'Adicionar um novo' }} tipo de denúncia</p>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-4">
      <div class="d-flex gap-4">
        <a href="{{route('reportTypeView')}}" class="btn btn-label-secondary">Voltar</a>
      </div>
      <button type="submit" class="btn btn-primary" form="category_form">Salvar</button>
    </div>
  </div>


    <div class="col-xxl">
      <form wire:submit.prevent="save" id="category_form">
        <div class="card mb-6">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Dados Gerais</h5>
          </div>
          <div class="card-body">

              <div class="row mb-6">
                <x-input  label="Nome" name="name" wire:model='name' />
              </div>
              <div class="row mb-6">
                <x-quill-editor label="Descrição" id="editor1" name="description" model="description" placeholder='' initialvalue="{!!$description!!}" />
              </div>
              <div class="row mb-6">
                <x-input-icon label="Ícone"  name="icon" wire:model='icon' :icon="$icon"  />
              </div>

          </div>
        </div>
      </form>
    </div>

    <div wire:ignore>
    <livewire:report-type.custom-field :reportId="$reportId" />
    </div>

</div>
