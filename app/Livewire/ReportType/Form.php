<?php

namespace App\Livewire\ReportType;

use App\Models\ReportType;
use Livewire\Component;

class Form extends Component
{


  public $icons = [];
  public $search = '';

  public $name = '';
  public $icon = '';
  public $description = '';



  public function render()
  {

    if ($this->search) {
      $this->seach_icon();
    } else {
      $this->icons = json_decode(file_get_contents(resource_path('icons\tabler-icons-outline.json')), true);
    }


    return view('livewire.report-type.form');
  }

  public function seach_icon()
  {

    $this->icons = collect($this->icons)->filter(function ($icon) {
      return strpos($icon, $this->search) !== false;
    })->toArray();
  }

  public function select_icon($icon)
  {
    $this->icon = $icon;
    $this->dispatch('iconSelected', $icon);
  }

  public function save()
  {
    $this->validate([
      'name' => 'required',
      'description' => 'required',
    ]);

    ReportType::create([
      'name' => $this->name,
      'icon' => $this->icon,
      'description' => $this->description,
    ]);

    $this->dispatch('reportTypeCreated', [
      'name' => $this->name,
      'icon' => $this->icon,
      'description' => $this->description,
    ]);

    $this->reset();
  }
}
