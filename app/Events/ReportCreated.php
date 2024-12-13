<?php

namespace App\Events;

use App\Models\Report as Report;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReportCreated
{
    use Dispatchable, SerializesModels;

    public $report;

    public function __construct(Report $report)
    {
        $this->report = $report;
    }
}
