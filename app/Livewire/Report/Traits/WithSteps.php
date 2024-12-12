<?php

namespace App\Livewire\Report\Traits;

trait WithSteps
{
    public function getSteps(): array
    {
        return [
            1 => 'Identificação',
            2 => 'Relato',
            3 => 'Informações Complementares',
            4 => 'Revisão'
        ];
    }

    public function nextStep(): void
    {
        $this->validateStep($this->step);

        if ($this->step < count($this->getSteps())) {
            $this->step++;
        } else {
            $this->submit();
        }
    }

    public function previousStep(): void
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    public function goToStep(int $step): void
    {
        if ($step >= 1 && $step <= count($this->getSteps())) {
            $this->step = $step;
        }
    }

    public function getProgressPercentageProperty(): int
    {
        return (int)(($this->step / count($this->getSteps())) * 100);
    }

    public function getStepTitleProperty(): string
    {
        return $this->getSteps()[$this->step] ?? '';
    }

    public function getIsLastStepProperty(): bool
    {
        return $this->step === count($this->getSteps());
    }
}
