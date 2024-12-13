<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
  public function index()
  {
      return view('content.report.tracking', [
          'pageTitle' => 'Consulta de Protocolo',
          'breadcrumbs' => [
              ['link' => "/", 'name' => "Home"],
              ['name' => "Consulta de Protocolo"]
          ]
      ]);
  }
}
