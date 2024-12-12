<div class="form-group">
    <label class="form-label">{{ $field->name }}</label>

    @switch($field->type)
        @case('text')
            <x-reports.fields.text-field :field="$field" :value="$value" />
            @break

        @case('textarea')
            <x-reports.fields.textarea-field :field="$field" :value="$value" />
            @break

        @case('radio')
            <x-reports.fields.radio-field :field="$field" :value="$value" />
            @break

        @case('checkbox')
            <x-reports.fields.checkbox-field :field="$field" :value="$value" />
            @break

        @case('select')
            <x-reports.fields.select-field :field="$field" :value="$value" />
            @break

        @case('date')
            <x-reports.fields.date-field :field="$field" :value="$value" />
            @break

        @default
            <x-reports.fields.text-field :field="$field" :value="$value" />
    @endswitch

    @error("custom_fields_values.{$field->id}")
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
