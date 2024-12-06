<?php

namespace App\View\Components;

use Illuminate\View\Component;

class QuillEditor extends Component
{

    public $id;
    public $model;
    public $placeholder;
    public $initialvalue;
    public $label;

    public function __construct($id, $model, $placeholder = 'Escreva algo...', $initialvalue = '', $label = '')
    {
        $this->id = $id;
        $this->model = $model;
        $this->placeholder = $placeholder;
        $this->initialvalue = $initialvalue;
        $this->label = $label;

    }

    public function render()
    {
        return view('components.quill-editor');
    }
}
