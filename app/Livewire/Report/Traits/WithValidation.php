<?php

namespace App\Livewire\Report\Traits;

trait WithValidation
{
    protected function rules(): array
    {
        return [
            'formData.is_anonymous' => 'required|in:true,false',
            'formData.reported_by' => 'required_if:formData.is_anonymous,false|min:3',
            'formData.email' => 'required_if:formData.is_anonymous,false|email',
            'formData.contact' => 'nullable|min:10',
            'formData.details' => 'required|min:20',
            'custom_fields_values.*' => 'required',
            'confirmed' => 'required|accepted'
        ];
    }

    protected function messages(): array
    {
        return [
            'formData.reported_by.required_if' => 'O nome é obrigatório para denúncias identificadas.',
            'formData.email.required_if' => 'O email é obrigatório para denúncias identificadas.',
            'formData.details.required' => 'O relato da denúncia é obrigatório.',
            'formData.details.min' => 'O relato deve ter pelo menos 20 caracteres.',
            'custom_fields_values.*.required' => 'Este campo é obrigatório.',
            'confirmed.accepted' => 'Você precisa confirmar a veracidade das informações.'
        ];
    }

    public function validateStep(int $step): void
    {
        $rules = $this->getStepValidationRules($step);
        $this->validate($rules);
    }

    protected function getStepValidationRules(int $step): array
    {
        return match ($step) {
            1 => [
                'formData.is_anonymous' => 'required|in:true,false',
                'formData.reported_by' => 'required_if:formData.is_anonymous,false|min:3',
                'formData.email' => 'required_if:formData.is_anonymous,false|email',
                'formData.contact' => 'nullable|min:10'
            ],
            2 => ['formData.details' => 'required|min:20'],
            3 => ['custom_fields_values.*' => 'required'],
            4 => ['confirmed' => 'accepted'],
            default => [],
        };
    }

    protected function validateFinalStep(): bool
    {
        return $this->validate($this->rules());
    }
}
