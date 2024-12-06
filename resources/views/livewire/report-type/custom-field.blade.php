<!-- Vendor Scripts -->
@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/jquery-repeater/jquery-repeater.js'
])
@endsection

<!-- Page Scripts -->
@section('page-script')
{{-- @vite(['resources/assets/js/forms-extras.js']) --}}
@endsection

{{-- @dd($types) --}}

<div class="col-12">
  <div class="card">
    <h5 class="card-header">Campos Personalizados</h5>
    <div class="card-body">
      {{-- <form class="form-repeater" wire:submit.prevent="addCustomField"> --}}
        <div data-repeater-list="group-a">

          <div data-repeater-item>
            <div class="row">
                <div class="mb-6 col-lg-6 col-xl-3 col-12 mb-0">
                <x-input label="Nome" name="custom[name]" wire:model.live="custom.name" />
                </div>
                <div class="mb-6 col-lg-6 col-xl-2 col-12 mb-0">
                <x-select label="Tipo" name="custom[selectedType]" wire:model.live="custom.selectedType" :options="$types" />
                </div>
                <div class="mb-6 col-lg-6 col-xl-2 col-12 mb-0">
                <x-input label="Opções" name="custom[options]" wire:model.live="custom.options" />
                </div>
                <div class="mb-6 col-lg-6 col-xl-1 col-12 mb-0">
                <x-input type="number" label="Ordem" name="custom[order]" wire:model.live="custom.order" />
                </div>
                <div class="mb-6 col-lg-6 col-xl-1 col-12 mb-0">
                <x-switch label="Obrigatório" name="custom[is_required]" wire:model.live="custom.is_required" />
                </div>
                <div class="mb-6 col-lg-6 col-xl-1 col-12 mb-0">
                <x-switch label="Ativo" name="custom[is_active]" wire:model.live="custom.is_active" />
                </div>

              <div class="mb-6 col-lg-12 col-xl-2 col-12 d-flex align-items-end mb-0">
                <button class="btn btn-success" wire:click='addRow'>
                  <i class="ti ti-plus ti-xs me-2"></i>
                  <span class="align-middle" >Salvar</span>
                </button>
              </div>
            </div>
            <hr class="mt-0">
          </div>


          @foreach($customs as $index => $item)
          <div data-repeater-item>
            <div class="row">
                <div class="mb-6 col-lg-6 col-xl-3 col-12 mb-0">
                <x-input label="Nome" name="custom[{{$index}}][name]" wire:model.live="customs.{{$index}}.name" />
                </div>
                <div class="mb-6 col-lg-6 col-xl-2 col-12 mb-0">
                <x-select label="Tipo" name="custom[{{$index}}][selectedType]" wire:model.live="customs.{{$index}}.selectedType" :options="$types" />
                </div>
                <div class="mb-6 col-lg-6 col-xl-2 col-12 mb-0">
                <x-input label="Opções" name="custom[{{$index}}][options]" wire:model.live="customs.{{$index}}.options" />
                </div>
                <div class="mb-6 col-lg-6 col-xl-1 col-12 mb-0">
                <x-input type="number" label="Ordem" name="custom[{{$index}}][order]" wire:model.live="customs.{{$index}}.order" />
                </div>
                <div class="mb-6 col-lg-6 col-xl-1 col-12 mb-0">
                <x-switch label="Obrigatório" name="custom[{{$index}}][is_required]" wire:model.live="customs.{{$index}}.is_required" />
                </div>
                <div class="mb-6 col-lg-6 col-xl-1 col-12 mb-0">
                <x-switch label="Ativo" name="custom[{{$index}}][is_active]" wire:model.live="customs.{{$index}}.is_active" />
                </div>

              <div class="mb-6 col-lg-12 col-xl-2 col-12 pt-5 mb-0">
                <button class="btn btn-label-success me-2" wire:click="editField({{$index}})">
                  <i class="ti ti-pencil ti-xs me-1"></i>
                  {{-- <span class="align-middle">Delete</span> --}}
                </button>
                <button class="btn btn-label-danger" wire:click="removeField({{$index}})">
                  <i class="ti ti-x ti-xs me-1"></i>
                  {{-- <span class="align-middle">Delete</span> --}}
                </button>
              </div>
            </div>
          </div>
          @endforeach
        </div>

      {{-- </form> --}}
    </div>
  </div>
</div>

