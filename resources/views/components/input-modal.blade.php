@props(['disabled' => false, 'name' => '', 'label' => ''])

@php
$hasError = $errors->has($name ?? '');
@endphp

<div>
  <label class="form-label" for="input-{{$name}}">{{$label ?? ''}}</label>
    <div class="input-group">

      <input id="input-{{$name}}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control' . ($hasError ? '
      is-invalid' : '')]) !!}>
      @if($hasError)
      <div class="invalid-feedback">
        {{ $errors->first($name) }}
      </div>
      @endif
      <button class="btn btn-outline-primary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#selectModal">S</button>
    </div>


<livewire:modals.modal-options :model="$name" />

<script>
  document.addEventListener('livewire:init', () => {
      Livewire.on('saveOptions', (event) => {
       {

        var values = JSON.stringify(event[0].values);
        var name = event[0].name;}
        @this.set(name, icon);
      });
  });
</script>


</div>
