<?php

namespace App\Livewire\Modals;

use Livewire\Component;

class ModalIcons extends Component
{
    public $icons = [];
    public $icon = '';
    public $search = '';
    public $model = '';
    public $name = '';

    public function render()
    {
      if ($this->search) {
        $this->seach_icon();
      } else {
        $this->icons = json_decode(file_get_contents(resource_path('icons\tabler-icons-outline.json')), true);
      }


        return view('livewire.modals.modal-icons');
    }

    public function seach_icon()
    {

      $this->icons = collect($this->icons)->filter(function ($icon) {
        return strpos($icon, $this->search) !== false;
      })->toArray();
    }

    public function select_icon($icon,$name)
    {

      $this->icon = $icon;
      $this->dispatch('iconSelected', ['icon' => $icon, 'name' => $name]);
    }


}
