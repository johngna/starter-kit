@props(['disabled' => false, 'name', 'label', 'icon' => false])

@php
$hasError = $errors->has($name ?? '');
@endphp

<div>
  <label class="form-label" for="input-{{$name}}">{{$label ?? ''}}</label>
  <div class="input-group">
    @if($icon)
    <span class="input-group-text" id="basic-addon11"> <i class="ti ti-{{$icon}}   cursor-pointer"></i></span>
    @endif
    <input id="input-{{$name}}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control' . ($hasError ? ' is-invalid' : '')]) !!}>
    @if($hasError)
    <div class="invalid-feedback">
      {{ $errors->first($name) }}
    </div>
    @endif
  </div>
</div>
