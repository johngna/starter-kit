<select
    class="form-select @error('custom_fields_values.' . $field->id) is-invalid @enderror"
    wire:model.live="custom_fields_values.{{$field->id}}"
>
    <option value="">Selecione uma opção</option>
    @foreach(json_decode($field->options) as $option)
        <option value="{{ $option }}">{{ $option }}</option>
    @endforeach
</select>
