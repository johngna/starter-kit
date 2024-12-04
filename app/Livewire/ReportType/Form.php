<?php

namespace App\Livewire\ReportType;

use App\Models\ReportType;
use Livewire\Component;

class Form extends Component
{


  public $icons = [];
  public $search = '';

  public $reportId = '';
  public $name = '';
  public $icon = '';
  public $description = '';


  public function mount()
  {

    //obter id da rota
    $id = request()->route('id');


    //se id for diferente de null
    if ($id) {
      //obter o tipo de relatório
      $reportType = ReportType::find($id);

      //se o tipo de relatório existir
      if ($reportType) {
        //atribuir os valores do tipo de relatório aos atributos
        $this->reportId = $reportType->id;
        $this->name = $reportType->name;
        $this->icon = $reportType->icon;
        $this->description = $reportType->description;
      }
    }
  }

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

    if ($this->reportId) {
      $this->update();
    } else {
      $this->create();
    }
  }

  public function create()
  {
    $this->validate([
      'name' => 'required',
      'description' => 'required'
    ]);

    ReportType::create([
      'name' => $this->name,
      'icon' => $this->icon,
      'description' => $this->description
    ]);

    session()->flash('message', 'Tipo de relatório criado com sucesso!');
    $this->reset();
  }

  public function update()
  {
    $this->validate([
      'name' => 'required',
      'description' => 'required'
    ]);

    $reportType = ReportType::find($this->reportId);

    $reportType->update([
      'name' => $this->name,
      'icon' => $this->icon,
      'description' => $this->description
    ]);

    session()->flash('message', 'Tipo de Denúncia atualizado com sucesso!');
  }
}
