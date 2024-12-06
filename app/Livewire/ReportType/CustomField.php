<?php

namespace App\Livewire\ReportType;

use Livewire\Component;

class CustomField extends Component
{


    public $index;
    public $custom = ['order' => 1, 'type' => 'text', 'required' => 0];
    public $customs = [];
    public $reportId;
    public $types = [
      'text' => 'Texto',
      'number' => 'Número',
      'date' => 'Data',
      'select' => 'Selecionar',
      'radio' => 'Rádio',
      'checkbox' => 'Caixa de seleção',
      'file' => 'Arquivo',
      'image' => 'Imagem',
      'textarea' => 'Área de texto',
      'email' => 'E-mail',
      'tel' => 'Telefone',
      'url' => 'URL',
    ];

    public function mount($reportId)
    {

    }

    public function render()
    {
        return view('livewire.report-type.custom-field');
    }


    public function addRow()
    {

      // if existir id, é uma edição
      if (isset($this->custom['id'])){
        $this->customs[$this->index] = $this->custom;
      } else {
        $this->customs[] = $this->custom;
      }

      $this->custom = [];


    }

    public function editField($index)
    {
        $this->custom = $this->customs[$index];
        $this->index = $index;
    }


    public function removeField($index)
    {
        unset($this->customs[$index]);
        $this->customs = array_values($this->customs);
    }


}
