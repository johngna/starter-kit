<textarea
    class="form-control @error('custom_fields_values.' . $field->id) is-invalid @enderror"
    rows="3"
    placeholder="{{ $field->placeholder ?? '' }}"
    wire:model.live="custom_fields_values.{{$field->id}}"
></textarea>
