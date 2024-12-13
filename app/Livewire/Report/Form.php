<?php

namespace App\Livewire\Report;

use Livewire\Component;
use App\Models\ReportType;
use Illuminate\Support\Facades\DB;
use App\Livewire\Report\Traits\WithValidation;
use App\Livewire\Report\Traits\WithAttachments;
use App\Services\Report\ProtocolGenerator;
use App\Services\Report\ReportService;

class Form extends Component
{

  use WithValidation, WithAttachments;

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
  public $confirmed = true;
  public $typeId;

  public function mount()
  {
    $this->typeId = request()->route('type');

    if ($this->typeId) {
      $type = ReportType::find($this->typeId);
      $this->custom_fields = $type->customFields;
    }
  }

  public function render()
  {
    return view('livewire.report.form');
  }


  public function  nextStep()
  {

    $this->validateStep($this->step);
    $this->step++;
  }

  public function previousStep()
  {
    $this->step--;
  }

  public function save()
  {



        $protocol = new ProtocolGenerator();
        $service = new ReportService($protocol);


        $report = $service->create([
            'report_type_id' => $this->typeId,
            'is_anonymous' => $this->is_anonymous === 'true',
            'reported_by' => $this->reported_by,
            'email' => $this->email,
            'contact' => $this->contact,
            'details' => $this->details,
            'custom_fields_values' => $this->custom_fields_values,
        ]);

        // Salva os anexos
        $this->saveAttachments($report);



  }

}
