@props(['disabled' => false, 'name'])

@php
$hasError = $errors->has($name ?? '');
@endphp

<div>
  <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control' . ($hasError ? '
  is-invalid' : '')]) !!}>

  @if($hasError)
  <div class="invalid-feedback">
    {{ $errors->first($name) }}
  </div>
  @endif
</div>
