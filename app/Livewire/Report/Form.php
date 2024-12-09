<?php

namespace App\Livewire\Report;

use Livewire\Component;
use App\Models\ReportType;

class Form extends Component
{

  public $is_anonymous = 'false';
  public $reported_by;
  public $contact;
  public $email;
  public $details;
  public $location;
  public $step = 1;
  public $custom_fields = [];
  public $custom_fields_values = [];

  public function mount()
  {
    $typeId = request()->route('type');

    if ($typeId) {
      $type = ReportType::find($typeId);
      $this->custom_fields = $type->customFields;
    }
  }

  public function render()
  {
    return view('livewire.report.form');
  }


  public function  nextStep()
  {
    $this->step++;
  }

  public function previousStep()
  {
    $this->step--;
  }
}
