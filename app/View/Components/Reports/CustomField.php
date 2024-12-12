<?php

namespace App\View\Components\Reports;

use Illuminate\View\Component;

class CustomField extends Component
{
    public $field;
    public $value;

    public function __construct($field, $value = null)
    {
        $this->field = $field;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.reports.custom-field');
    }
}
