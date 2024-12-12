<?php

namespace App\Livewire\Report;

use Livewire\Component;
use App\Models\ReportType;

class Form extends Component
{

  public $is_anonymous = 'true';
  public $reported_by;
  public $contact;
  public $email;
  public $details;
  public $location;
  public $date;
  public $step = 1;
  public $custom_fields = [];
  public $custom_fields_values = [];
  public $confirmed = false;

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

  public function submit()
  {
    $this->validate([
      'details' => 'required',
      'location' => 'required',
      'date' => 'required',
    ]);

    $data = [
      'reported_by' => $this->reported_by,
      'contact' => $this->contact,
      'email' => $this->email,
      'details' => $this->details,
      'location' => $this->location,
      'is_anonymous' => $this->is_anonymous,
      'custom_fields' => $this->custom_fields_values,
    ];

    // Save to database
    $this->confirmed = true;
  }

}
