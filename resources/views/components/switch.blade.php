@props(['disabled' => false, 'name', 'label' ])

@php
$hasError = $errors->has($name ?? '');
@endphp

<div>

      <div class="">
        <label class="form-label" for="select-{{$name}}">{{$label ?? ''}}</label>
        <div class="mt-1">
          <label class="switch switch-lg">
            <input type="checkbox" name="{{$name}}" class="switch-input" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $hasError ? 'is-invalid' : '']) !!} />
            <span class="switch-toggle-slider">
              <span class="switch-on">
                <i class="ti ti-check"></i>
              </span>
              <span class="switch-off">
                <i class="ti ti-x"></i>
              </span>
            </span>
          </label>
        </div>
      </div>

    @if($hasError)
    <div class="invalid-feedback">
      {{ $errors->first($name) }}
    </div>
    @endif

</div>
