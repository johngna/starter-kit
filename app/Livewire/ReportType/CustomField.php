<?php

namespace App\Livewire\ReportType;

use Livewire\Component;
use App\Models\ReportType;
use Livewire\Attributes\On;
use App\Models\CustomField as ModelsCustomField;

class CustomField extends Component
{


  public $index;
  public $custom = ['order' => 1, 'type' => 'text', 'is_required' => 0];
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

    $this->reportId = $reportId;

    if ($reportId) {
      $this->customs = ReportType::find($reportId)->customFields->toArray();
    }
  }

  public function render()
  {
    return view('livewire.report-type.custom-field');
  }


  public function addRow()
  {

    // if existir id, é uma edição
    if (isset($this->custom['id'])) {

      ModelsCustomField::find($this->custom['id'])->update($this->custom);

      $this->customs[$this->index] = $this->custom;
    } else {

      if ($this->reportId) {
        ReportType::find($this->reportId)->customFields()->create($this->custom);
        $id = ModelsCustomField::latest()->first()->id;
        $this->custom['id'] = $id;
      }

      $this->customs[] = $this->custom;
    }

    $this->custom = ['order' => 1, 'type' => 'text', 'is_required' => 0];
  }

  public function editField($index)
  {
    $this->custom = $this->customs[$index];
    $this->index = $index;
  }


  public function removeField($index)
  {

    if (isset($this->customs[$index]['id'])) {
      ModelsCustomField::find($this->customs[$index]['id'])->delete();
    }


    unset($this->customs[$index]);
    $this->customs = array_values($this->customs);
  }
}
