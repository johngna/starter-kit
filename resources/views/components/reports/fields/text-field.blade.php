<input
    type="text"
    class="form-control @error('custom_fields_values.' . $field->id) is-invalid @enderror"
    placeholder="{{ $field->placeholder ?? '' }}"
    wire:model.live="custom_fields_values.{{$field->id}}"
/>
