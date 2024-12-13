<?php

namespace App\Livewire\Modals;

use Livewire\Component;

class ModalOptions extends Component
{
    public $options = [];
    public $option = '';
    public $model = '';
    public $name = '';

    public function render()
    {

        return view('livewire.modals.modal-options');
    }


    public function addOption()
    {
        $this->options[] = $this->option;
        $this->option = '';
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);
    }


    public function SaveOption()
    {
        $this->dispatch('saveOptions', ['values' => $this->options, 'name' => $this->name]);
    }

}
