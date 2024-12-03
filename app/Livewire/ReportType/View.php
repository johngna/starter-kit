<?php

namespace App\Livewire\ReportType;

use App\Models\ReportType;
use Livewire\Component;


class View extends Component
{
  public $reportTypes = [];

  public function render()
  {

    $this->reportTypes = ReportType::all();


    return view('livewire.report-type.view');
  }
}
