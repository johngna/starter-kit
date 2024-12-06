@props(['disabled' => false, 'name', 'label', 'options' => [] ])

@php
$hasError = $errors->has($name ?? '');
@endphp

<div>
  <label class="form-label" for="select-{{$name}}">{{$label ?? ''}}</label>

    <select  name="{{$name}}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-select' . ($hasError ? ' is-invalid' : '')]) !!}>
      @foreach($options as $value => $text)
        <option value="{{ $value }}">{{ $text }}</option>
      @endforeach
    </select>
    @if($hasError)
    <div class="invalid-feedback">
      {{ $errors->first($name) }}
    </div>
    @endif

</div>
