<?php

namespace App\Livewire\Report\Traits;

trait WithValidation
{


    public function validateStep(int $step): void
    {
        $rules = $this->getStepValidationRules($step);

        if ($this->is_anonymous == 'false') {
            $rules['reported_by'] = 'required|min:3';
            $rules['email'] = 'required|email';
            $rules['contact'] = 'required|min:10';
        }


        if($this->step == 3){
          if($this->custom_fields){
              foreach ($this->custom_fields as $field) {
                  if($field->is_required){
                      $rules['custom_fields_values.'.$field->id] = 'required';
                  }
              }
          }
        }




        $this->validate($rules);
    }

    protected function getStepValidationRules(int $step): array
    {
        return match ($step) {
            1 => [
                'is_anonymous' => 'required',
            ],
            2 => ['details' => 'required|min:20'],
            3 => ['location' => 'required', 'date' => 'nullable'],
            default => [],
        };
    }


}
