<?php

namespace App\Livewire\ReportType;

use Livewire\Component;
use App\Models\ReportType;
use Livewire\Attributes\On;

class Form extends Component
{


  public $reportId = '';
  public $name = '';
  public $icon = '';
  public $description = '';



  public function mount()
  {

    //obter id da rota
    $id = request()->route('id');


    if ($id == 'create') {
      $this->reset();
    } else {
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
  }



  public function render()
  {

    return view('livewire.report-type.form');
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

    $report = ReportType::create([
      'name' => $this->name,
      'icon' => $this->icon,
      'description' => $this->description
    ]);

    $this->reportId = $report->id;

    $this->dispatch('toast', ['message' => 'Tipo de relatório incluído com sucesso!', 'title' => 'sucesso']);
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

    $this->dispatch('toast', ['message' => 'Tipo de relatório atualizado com sucesso!', 'title' => 'sucesso']);
  }

  #[On('removeReport')]
  public function removeReport($id)
  {


    $reportType = ReportType::find($id);

    if ($reportType) {
      $reportType->delete();
      $this->dispatch('toast', ['message' => 'Tipo de relatório removido com sucesso!', 'title' => 'sucesso']);
      return redirect()->route('reportTypeView');
    }
  }
}
