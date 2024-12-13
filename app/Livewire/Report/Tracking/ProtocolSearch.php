<?php

namespace App\Livewire\Report\Tracking;

use Livewire\Component;
use App\Services\Report\Tracking\TrackingService;

class ProtocolSearch extends Component
{

  public $protocol;
  public $email;
  public $searchPerformed = false;
  public $report = null;

  protected function rules()
  {
      return [
          'protocol' => 'required|regex:/^\d{10}$/',
          'email' => 'nullable|email'
      ];
  }

  protected $messages = [
      'protocol.required' => 'O número do protocolo é obrigatório.',
      'protocol.regex' => 'O protocolo deve conter 10 dígitos numéricos.',
      'email.email' => 'Digite um e-mail válido.'
  ];

  protected $trackingService;

  public function boot(TrackingService $trackingService)
  {
      $this->trackingService = $trackingService;
  }

  public function render()
  {
      return view('livewire.report.tracking.protocol-search');
  }

  public function search()
  {
      $this->searchPerformed = false;
      $this->report = null;

      $this->validate();

      try {
          $this->report = $this->trackingService->findReport($this->protocol, $this->email);
          $this->searchPerformed = true;
      } catch (\Exception $e) {
          session()->flash('error', 'Protocolo não encontrado.');
      }
  }

  public function resetSearch()
  {
      $this->reset(['protocol', 'email', 'searchPerformed', 'report']);
      $this->resetValidation();
  }
}
