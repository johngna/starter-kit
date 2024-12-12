<div>
    @foreach(json_decode($field->options) as $option)
        <div class="form-check">
            <input
                type="radio"
                class="form-check-input"
                id="field_{{$field->id}}_{{$loop->index}}"
                value="{{ $option }}"
                wire:model.live="custom_fields_values.{{$field->id}}"
            >
            <label class="form-check-label" for="field_{{$field->id}}_{{$loop->index}}">
                {{ $option }}
            </label>
        </div>
    @endforeach
</div>
