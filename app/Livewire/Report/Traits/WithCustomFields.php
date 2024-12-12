<?php

namespace App\Livewire\Report\Traits;

use App\Models\CustomField;
use Illuminate\Support\Collection;

trait WithCustomFields
{
    public Collection $custom_fields;

    public function initializeCustomFields(): void
    {
        $this->custom_fields = $this->reportService->getCustomFields();
    }

    public function getCustomFieldValue(int $fieldId): mixed
    {
        return $this->custom_fields_values[$fieldId] ?? null;
    }

    public function handleCustomFieldUpdate(int $fieldId, $value): void
    {
        $this->custom_fields_values[$fieldId] = $value;
    }

    public function renderCustomField(CustomField $field): string
    {
        return match ($field->type) {
            'text' => view('livewire.report.fields.text', ['field' => $field])->render(),
            'textarea' => view('livewire.report.fields.textarea', ['field' => $field])->render(),
            'radio' => view('livewire.report.fields.radio', ['field' => $field])->render(),
            'checkbox' => view('livewire.report.fields.checkbox', ['field' => $field])->render(),
            'select' => view('livewire.report.fields.select', ['field' => $field])->render(),
            default => '',
        };
    }

    public function getCustomFieldOptions(CustomField $field): array
    {
        return $field->options ?? [];
    }

    public function formatCustomFieldValue(CustomField $field, $value): string
    {
        if (in_array($field->type, ['radio', 'select'])) {
            $options = $this->getCustomFieldOptions($field);
            return $options[$value] ?? $value;
        }

        if ($field->type === 'checkbox') {
            return is_array($value) ? implode(', ', array_map(fn($v) => $options[$v] ?? $v, $value)) : $value;
        }

        return (string) $value;
    }
}
