<input
    type="date"
    class="form-control @error('custom_fields_values.' . $field->id) is-invalid @enderror"
    wire:model.live="custom_fields_values.{{$field->id}}"
/>
