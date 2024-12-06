@props(['disabled' => false, 'name' => '', 'label' => '', 'icon' => false])

@php
$hasError = $errors->has($name ?? '');
@endphp

<div>
  <label class="form-label" for="input-{{$name}}">{{$label ?? ''}}</label>
    <div class="input-group">
      <span class="input-group-text" id="basic-addon11"> <i id="icon_ti" class="ti ti-{{$icon}}   cursor-pointer"></i>
      </span>
      <input id="input-{{$name}}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control' . ($hasError ? '
      is-invalid' : '')]) !!}>
      @if($hasError)
      <div class="invalid-feedback">
        {{ $errors->first($name) }}
      </div>
      @endif
      <button class="btn btn-outline-primary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#selectIcons">Selecionar</button>
    </div>


<livewire:modals.modal-icons :model="$name" />

<script>
  document.addEventListener('livewire:init', () => {
      Livewire.on('iconSelected', (event) => {
       { var icon = event[0].icon;
        var name = event[0].name;}
        @this.set(name, icon);
      });
  });
</script>


</div>
